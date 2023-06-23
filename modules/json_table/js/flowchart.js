function nodeStyle() {
  return [
    // The Node.location comes from the "loc" property of the node data,
    // converted by the Point.parse static method.
    // If the Node.location is changed, it updates the "loc" property of the node data,
    // converting back using the Point.stringify static method.
    new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
    {
      // the Node.location is at the center of each node
      locationSpot: go.Spot.Center,
    }
  ];
}

// Define a function for creating a "port" that is normally transparent.
// The "name" is used as the GraphObject.portId,
// the "align" is used to determine where to position the port relative to the body of the node,
// the "spot" is used to control how links connect with the port and whether the port
// stretches along the side of the node,
// and the boolean "output" and "input" arguments control whether the user can draw links from or to the port.
function makePort(name, align, spot, output, input) {
  var horizontal = align.equals(go.Spot.Top) || align.equals(go.Spot.Bottom);
  // the port is basically just a transparent rectangle that stretches along the side of the node,
  // and becomes colored when the mouse passes over it
  return go.GraphObject.make(go.Shape,
    {
      fill: "transparent",  // changed to a color in the mouseEnter event handler
      strokeWidth: 0,  // no stroke
      desiredSize: new go.Size(8, 8),
      width: horizontal ? NaN : 8,  // if not stretching horizontally, just 8 wide
      height: !horizontal ? NaN : 8,  // if not stretching vertically, just 8 tall
      alignment: align,  // align the port on the main Shape
      stretch: (horizontal ? go.GraphObject.Horizontal : go.GraphObject.Vertical),
      portId: name,  // declare this object to be a "port"
      fromSpot: spot,  // declare where links may connect at this port
      fromLinkable: output,  // declare whether the user may draw links from here
      toSpot: spot,  // declare where links may connect at this port
      toLinkable: input,  // declare whether the user may draw links to here
      cursor: "pointer",  // show a different cursor to indicate potential link point
      mouseEnter: (e, port) => {  // the PORT argument will be this Shape
        if (!e.diagram.isReadOnly) {
          port.fill = "rgba(255,0,255,0.5)";
        }
      },
      mouseLeave: (e, port) => port.fill = "transparent"
    });
}

// Make link labels visible if coming out of a "conditional" node.
// This listener is called by the "LinkDrawn" and "LinkRelinked" DiagramEvents.
function showLinkLabel(e) {
  let label = e.subject.findObject("LABEL");
  if (label !== null) {
    label.visible = (e.subject.fromNode.data.category === "Conditional");
  }
}

// This is a re-implementation of the default animation, except it fades in from downwards, instead of upwards.
function animateFadeDown(e) {
  let diagram = e.diagram;
  let animation = new go.Animation();
  animation.isViewportUnconstrained = true; // So Diagram positioning rules let the animation start off-screen
  animation.easing = go.Animation.EaseOutExpo;
  animation.duration = 900;
  // Fade "down", in other words, fade in from above
  animation.add(diagram, 'position', diagram.position.copy().offset(0, 200), diagram.position);
  animation.add(diagram, 'opacity', 0, 1);
  animation.start();
}

function flowChart(configuration) {

  // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
  // For details, see https://gojs.net/latest/intro/buildingObjects.html
  const $ = go.GraphObject.make;  // for conciseness in defining templates
  let idDiagram = configuration.idDiagram, idPalette = configuration.idPalette,
    idTextareaData = configuration.idTextareaData;
  let config = {
    ...{
      textStyle: {stroke: "black"},
      rectangle: {fill: "white", stroke: "black", strokeWidth: 3},
      define: {fill: "lightyellow", stroke: "blue", strokeWidth: 1.5},
      diamond: {fill: "white", stroke: "blue", strokeWidth: 3},
      file: {fill: "white", stroke: "#DEE0A3", strokeWidth: 3},
      terminal: {fill: "white", stroke: "red", strokeWidth: 3},
      document: {fill: "lightyellow", stroke: "gray", strokeWidth: 3},
      circle: {desiredSize: new go.Size(70, 70), fill: "white", stroke: "green", strokeWidth: 3},
      circle_smaller: {desiredSize: new go.Size(60, 60), fill: "white", stroke: "#DC3C00", strokeWidth: 3},
      textYes: {textAlign: "center", font: "10pt helvetica, arial, sans-serif", stroke: "#333333", editable: true},
      templateBlock: {
        margin: 8,
        maxSize: new go.Size(160, NaN),
        textAlign: "center",
        wrap: go.TextBlock.WrapFit,
        editable: true
      },
      palette: [  // specify the contents of the Palette
        {category: "Terminal", text: Drupal.t("Start/End")},
        {text: Drupal.t("Step")},
        {category: "Circle", text: Drupal.t("Circle")},
        {category: "Predefined", text: Drupal.t("Defined")},
        {category: "Database", text: Drupal.t("Database")},
        {category: "Document", text: Drupal.t("Document")},
        {category: "Manual", text: Drupal.t("Manual")},
        {category: "Actor", text: Drupal.t("Actor")},
        {category: "Conditional", text: "???"},
        {category: "Comment", text: Drupal.t("Comment")}
      ],
    },
    ...configuration,
  };

  flowDiagram =
    $(go.Diagram, idDiagram,  // must name or refer to the DIV HTML element
      {
        initialContentAlignment: go.Spot.Center,
        LinkDrawn: showLinkLabel,  // this DiagramEvent listener is defined below
        LinkRelinked: showLinkLabel,
        "undoManager.isEnabled": true  // enable undo & redo
      }
    );

  if (config.isReadOnly) {
    flowDiagram.isReadOnly = true;
  }
  // when the document is modified, add a "*" to the title and enable the "Save" button
  flowDiagram.addDiagramListener("Modified", e => {
    let idx = document.title.indexOf("*");
    if (flowDiagram.isModified) {
      if (idx < 0) {
        document.title += "*";
      }
    } else {
      if (idx >= 0) {
        document.title = document.title.slice(0, idx);
      }
    }
  });

  // taken from https://unpkg.com/gojs@2.2.19/extensions/Figures.js:
  const KAPPA = 4 * ((Math.sqrt(2) - 1) / 3);
  go.Shape.defineFigureGenerator("File", (shape, w, h) => {
    let geo = new go.Geometry();
    let fig = new go.PathFigure(0, 0, true); // starting point
    geo.add(fig);
    fig.add(new go.PathSegment(go.PathSegment.Line, .75 * w, 0));
    fig.add(new go.PathSegment(go.PathSegment.Line, w, .25 * h));
    fig.add(new go.PathSegment(go.PathSegment.Line, w, h));
    fig.add(new go.PathSegment(go.PathSegment.Line, 0, h).close());
    let fig2 = new go.PathFigure(.75 * w, 0, false);
    geo.add(fig2);
    // The Fold
    fig2.add(new go.PathSegment(go.PathSegment.Line, .75 * w, .25 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, w, .25 * h));
    geo.spot1 = new go.Spot(0, .25);
    geo.spot2 = go.Spot.BottomRight;
    return geo;
  });
  go.Shape.defineFigureGenerator("Procedure", function (shape, w, h) {
    let geo = new go.Geometry();
    let param1 = shape ? shape.parameter1 : NaN;
    // Distance of left  and right lines from edge
    if (isNaN(param1)) {
      param1 = .1;
    }
    let fig = new go.PathFigure(0, 0, true);
    geo.add(fig);

    fig.add(new go.PathSegment(go.PathSegment.Line, w, 0));
    fig.add(new go.PathSegment(go.PathSegment.Line, w, h));
    fig.add(new go.PathSegment(go.PathSegment.Line, 0, h).close());
    let fig2 = new go.PathFigure((1 - param1) * w, 0, false);
    geo.add(fig2);
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - param1) * w, h));
    fig2.add(new go.PathSegment(go.PathSegment.Move, param1 * w, 0));
    fig2.add(new go.PathSegment(go.PathSegment.Line, param1 * w, h));
    //??? geo.spot1 = new go.Spot(param1, 0);
    //??? geo.spot2 = new go.Spot(1 - param1, 1);
    return geo;
  });
  go.Shape.defineFigureGenerator("Database", function (shape, w, h) {
    let geo = new go.Geometry();
    let cpxOffset = KAPPA * .5;
    let cpyOffset = KAPPA * .1;
    let fig = new go.PathFigure(w, .1 * h, true);
    geo.add(fig);

    // Body
    fig.add(new go.PathSegment(go.PathSegment.Line, w, .9 * h));
    fig.add(new go.PathSegment(go.PathSegment.Bezier, .5 * w, h, w, (.9 + cpyOffset) * h,
      (.5 + cpxOffset) * w, h));
    fig.add(new go.PathSegment(go.PathSegment.Bezier, 0, .9 * h, (.5 - cpxOffset) * w, h,
      0, (.9 + cpyOffset) * h));
    fig.add(new go.PathSegment(go.PathSegment.Line, 0, .1 * h));
    fig.add(new go.PathSegment(go.PathSegment.Bezier, .5 * w, 0, 0, (.1 - cpyOffset) * h,
      (.5 - cpxOffset) * w, 0));
    fig.add(new go.PathSegment(go.PathSegment.Bezier, w, .1 * h, (.5 + cpxOffset) * w, 0,
      w, (.1 - cpyOffset) * h));
    let fig2 = new go.PathFigure(w, .1 * h, false);
    geo.add(fig2);
    // Rings
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, .5 * w, .2 * h, w, (.1 + cpyOffset) * h,
      (.5 + cpxOffset) * w, .2 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, 0, .1 * h, (.5 - cpxOffset) * w, .2 * h,
      0, (.1 + cpyOffset) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Move, w, .2 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, .5 * w, .3 * h, w, (.2 + cpyOffset) * h,
      (.5 + cpxOffset) * w, .3 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, 0, .2 * h, (.5 - cpxOffset) * w, .3 * h,
      0, (.2 + cpyOffset) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Move, w, .3 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, .5 * w, .4 * h, w, (.3 + cpyOffset) * h,
      (.5 + cpxOffset) * w, .4 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, 0, .3 * h, (.5 - cpxOffset) * w, .4 * h,
      0, (.3 + cpyOffset) * h));
    geo.spot1 = new go.Spot(0, .4);
    geo.spot2 = new go.Spot(1, .9);
    return geo;
  });
  go.Shape.defineFigureGenerator("Document", function (shape, w, h) {
    let geo = new go.Geometry();
    h = h / .8;
    let fig = new go.PathFigure(0, .7 * h, true);
    geo.add(fig);

    fig.add(new go.PathSegment(go.PathSegment.Line, 0, 0));
    fig.add(new go.PathSegment(go.PathSegment.Line, w, 0));
    fig.add(new go.PathSegment(go.PathSegment.Line, w, .7 * h));
    fig.add(new go.PathSegment(go.PathSegment.Bezier, 0, .7 * h, .5 * w, .4 * h, .5 * w, h).close());
    geo.spot1 = go.Spot.TopLeft;
    geo.spot2 = new go.Spot(1, .6);
    return geo;
  });
  go.Shape.defineFigureGenerator("ManualOperation", function (shape, w, h) {
    let param1 = shape ? shape.parameter1 : NaN;
    // Distance from topleft of bounding rectangle,
    // in % of the total width, of the topleft corner
    if (isNaN(param1)) {
      // default value
      param1 = 10;
    }
    else if (param1 < -w) {
      param1 = -w / 2;
    }
    else if (param1 > w) {
      param1 = w / 2;
    }
    let indent = Math.abs(param1);

    if (param1 === 0) {
      let geo = new go.Geometry(go.Geometry.Rectangle);
      geo.startX = 0;
      geo.startY = 0;
      geo.endX = w;
      geo.endY = h;
      return geo;
    } else {
      let geo = new go.Geometry();
      if (param1 > 0) {
        geo.add(new go.PathFigure(0, 0)
          .add(new go.PathSegment(go.PathSegment.Line, w, 0))
          .add(new go.PathSegment(go.PathSegment.Line, w - indent, h))
          .add(new go.PathSegment(go.PathSegment.Line, indent, h).close()));
      } else {  // param1 < 0
        geo.add(new go.PathFigure(indent, 0)
          .add(new go.PathSegment(go.PathSegment.Line, w - indent, 0))
          .add(new go.PathSegment(go.PathSegment.Line, w, h))
          .add(new go.PathSegment(go.PathSegment.Line, 0, h).close()));
      }
      if (indent < w / 2) {
        geo.setSpots(indent / w, 0, (w - indent) / w, 1);
      }
      return geo;
    }
  });
  go.Shape.defineFigureGenerator("Actor", function (shape, w, h) {
    let geo = new go.Geometry();
    let fig = new go.PathFigure(0, 0, false);
    geo.add(fig);

    let fig2 = new go.PathFigure(.335 * w, (1 - .555) * h, true);
    geo.add(fig2);
    // Shirt
    fig2.add(new go.PathSegment(go.PathSegment.Line, .335 * w, (1 - .405) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - .335) * w, (1 - .405) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - .335) * w, (1 - .555) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, w, .68 * h, (1 - .12) * w, .46 * h,
      (1 - .02) * w, .54 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, w, h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, 0, h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, 0, .68 * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, .335 * w, (1 - .555) * h, .02 * w, .54 * h,
      .12 * w, .46 * h));
    // Start of neck
    fig2.add(new go.PathSegment(go.PathSegment.Line, .365 * w, (1 - .595) * h));
    let radiushead = .5 - .285;
    let centerx = .5;
    let centery = radiushead;
    let alpha2 = Math.PI / 4;
    let KAPPA = ((4 * (1 - Math.cos(alpha2))) / (3 * Math.sin(alpha2)));
    let cpOffset = KAPPA * .5;
    let radiusw = radiushead;
    let radiush = radiushead;
    let offsetw = KAPPA * radiusw;
    let offseth = KAPPA * radiush;
    // Circle (head)
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, (centerx - radiusw) * w, centery * h, (centerx - ((offsetw + radiusw) / 2)) * w, (centery + ((radiush + offseth) / 2)) * h,
      (centerx - radiusw) * w, (centery + offseth) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, centerx * w, (centery - radiush) * h, (centerx - radiusw) * w, (centery - offseth) * h,
      (centerx - offsetw) * w, (centery - radiush) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, (centerx + radiusw) * w, centery * h, (centerx + offsetw) * w, (centery - radiush) * h,
      (centerx + radiusw) * w, (centery - offseth) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Bezier, (1 - .365) * w, (1 - .595) * h, (centerx + radiusw) * w, (centery + offseth) * h,
      (centerx + ((offsetw + radiusw) / 2)) * w, (centery + ((radiush + offseth) / 2)) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - .365) * w, (1 - .595) * h));
    // Neckline
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - .335) * w, (1 - .555) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, (1 - .335) * w, (1 - .405) * h));
    fig2.add(new go.PathSegment(go.PathSegment.Line, .335 * w, (1 - .405) * h));
    let fig3 = new go.PathFigure(.2 * w, h, false);
    geo.add(fig3);
    // Arm lines
    fig3.add(new go.PathSegment(go.PathSegment.Line, .2 * w, .8 * h));
    let fig4 = new go.PathFigure(.8 * w, h, false);
    geo.add(fig4);
    fig4.add(new go.PathSegment(go.PathSegment.Line, .8 * w, .8 * h));
    return geo;
  });

  // define the Node templates for regular nodes
  flowDiagram.nodeTemplateMap.add("",  // the default category
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Rectangle", config.rectangle, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay()),
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.TopSide, false, true),
      makePort("L", go.Spot.Left, go.Spot.LeftSide, true, true),
      makePort("R", go.Spot.Right, go.Spot.RightSide, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.BottomSide, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Conditional",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Diamond", config.diamond, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Circle",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Circle", config.circle, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Terminal",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Ellipse", config.terminal, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Predefined",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Procedure", config.define, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Database",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Database", config.circle, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Document",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "Document", config.document, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Manual",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Auto",
        $(go.Shape, "ManualOperation", config.rectangle, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Actor",
    $(go.Node, "Table", nodeStyle(),
      // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
      $(go.Panel, "Horizontal",
        $(go.Shape, "Actor", config.circle_smaller, new go.Binding("figure", "figure")),
        $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      ),
      // four named ports, one on each side:
      makePort("T", go.Spot.Top, go.Spot.Top, false, true),
      makePort("L", go.Spot.Left, go.Spot.Left, true, true),
      makePort("R", go.Spot.Right, go.Spot.Right, true, true),
      makePort("B", go.Spot.Bottom, go.Spot.Bottom, true, false)
    ));

  flowDiagram.nodeTemplateMap.add("Comment",
    $(go.Node, "Auto", nodeStyle(),
      $(go.Shape, "File", config.file),
      $(go.TextBlock, config.textStyle, config.templateBlock, new go.Binding("text").makeTwoWay())
      // no ports, because no links are allowed to connect with a comment
    ));

  // replace the default Link template in the linkTemplateMap
  flowDiagram.linkTemplate =
    $(go.Link,  // the whole link panel
      {
        routing: go.Link.AvoidsNodes,
        curve: go.Link.JumpOver,
        corner: 5, toShortLength: 4,
        relinkableFrom: true,
        relinkableTo: true,
        reshapable: true,
        resegmentable: true,
        // mouse-overs subtly highlight links:
        mouseEnter: (e, link) => link.findObject("HIGHLIGHT").stroke = "rgba(30,144,255,0.2)",
        mouseLeave: (e, link) => link.findObject("HIGHLIGHT").stroke = "transparent",
        selectionAdorned: false
      },
      new go.Binding("points").makeTwoWay(),
      $(go.Shape,  // the highlight shape, normally transparent
        {isPanelMain: true, strokeWidth: 8, stroke: "transparent", name: "HIGHLIGHT"}),
      $(go.Shape,  // the link path shape
        {isPanelMain: true, stroke: "gray", strokeWidth: 2},
        new go.Binding("stroke", "isSelected", sel => sel ? "dodgerblue" : "gray").ofObject()),
      $(go.Shape,  // the arrowhead
        {toArrow: "standard", strokeWidth: 0, fill: "gray"}),
      $(go.Panel, "Auto",  // the link label, normally not visible
        {visible: false, name: "LABEL", segmentIndex: 2, segmentFraction: 0.5},
        new go.Binding("visible", "visible").makeTwoWay(),
        $(go.Shape, "RoundedRectangle",  // the label shape
          {fill: "#F8F8F8", strokeWidth: 0}),
        $(go.TextBlock, "Yes", config.textYes, new go.Binding("text").makeTwoWay())
      ),
    );

  // temporary links used by LinkingTool and RelinkingTool are also orthogonal:
  flowDiagram.toolManager.linkingTool.temporaryLink.routing = go.Link.Orthogonal;
  flowDiagram.toolManager.relinkingTool.temporaryLink.routing = go.Link.Orthogonal;

  // initialize the Palette that is on the left side of the page
  if (idPalette) {
    let flowPalette = $(go.Palette, idPalette,
      {
        // Instead of the default animation, use a custom fade-down
        "animationManager.initialAnimationStyle": go.AnimationManager.None,
        "InitialAnimationStarting": animateFadeDown, // Instead, animate with this function

        nodeTemplateMap: flowDiagram.nodeTemplateMap,  // share the templates used by myDiagram
        model: new go.GraphLinksModel(config.palette)
      }
    );
  }

  if (config.data) {
    flowDiagram.model = go.Model.fromJson(config.data);
  }
  flowDiagram.model.class = "go.GraphLinksModel";
  flowDiagram.model.linkFromPortIdProperty = "fromPort";
  flowDiagram.model.linkToPortIdProperty = "toPort";
  flowDiagram.addModelChangedListener(function (evt) {
    if (evt.isTransactionFinished) {
      let data = JSON.parse(evt.model.toJSON());
      let element = document.getElementById(idTextareaData);
      if (data.nodeDataArray && data.nodeDataArray.length && typeof (element) != 'undefined' && element != null) {
        document.getElementById(idTextareaData).value = JSON.stringify(data);
        flowDiagram.isModified = false;
      }
    }
  });
} // end init

(function (Drupal, $, once) {
  Drupal.behaviors.flowChart = {
    attach: function (context, settings) {
      $('.flowchart-editor').once()
      $(once('flowchart_editor', '.flowchart-editor', context)).each(function (selector) {
        let configuration = {
          idDiagram: $(this).data('id') + '-diagram',
          idPalette: $(this).data('id') + '-palette',
          idTextareaData: $(this).attr('id'),
          data: $(this).val(),
          label: {
            textYes: Drupal.t('Yes'),
          }
        };
        flowChart(configuration);
      });
      $('.flowchart-display').once().each(function (selector) {
        let configuration = {
          idDiagram: $(this).data('id') + '-diagram',
          idTextareaData: $(this).data('id'),
          label: {
            textYes: Drupal.t('Yes'),
          },
          isReadOnly: true,
        };
        configuration.data = drupalSettings.json_flowchart[$(this).data('id')];

        flowChart(configuration);
      });
    }
  };

}(Drupal, jQuery, once));
