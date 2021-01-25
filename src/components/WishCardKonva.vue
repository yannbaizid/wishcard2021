<template>
  <div id="app">
    <div>{{ message }}</div>
    <!-- Canvas -->
    <canvas id="canvas" ref="canvas"></canvas>
    <canvas id="canvas2" ref="canvas2"></canvas>
    <!-- Add Rectangle Button -->
    <div>salut</div>
  </div>
</template>

<script>
export default {
  name: "wishcardkonva",
  data() {
    return {
      message: "Vue + Canvas API",
      vueCanvas: null,
      vueCanvas2: null,
      rectWidth: 200,
    };
  },
  computed: {},
  mounted() {
    let dpi = window.devicePixelRatio;
    console.log("wish card konva mounted, dpi:" + dpi);
    var c = this.$refs.canvas;
    c.setAttribute("width", 600 * dpi);
    c.setAttribute("height", 600 * dpi);
    var ctx = c.getContext("2d");
    console.log(c);
    console.log(ctx);
    this.vueCanvas = ctx;

    var c2 = this.$refs.canvas2;
    c2.setAttribute("width", 600 * dpi);
    c2.setAttribute("height", 600 * dpi);
    var ctx2 = c2.getContext("2d");

    this.vueCanvas2 = ctx2;

    console.log(this.vueCanvas.canvas.width);
    var img = new Image(); // Crée un nouvel élément Image
    img.src = require("../assets/photo2.jpg"); // Dé}
    img.onload = () => {
      console.log("géchar come jaja");
      this.vueCanvas.drawImage(img, 0, 0, 600, 300);
      this.fillCircle();
    };

    this.vueCanvas.canvas.addEventListener("click", (event) => {
      this.pick(event);
    });
  },
  methods: {
    pick(event) {
      console.log(event);
      var x = event.layerX - event.target.offsetLeft;
      var y = event.layerY - event.target.offsetTop;
      console.log(
        "x:" + event.layerX + "y:" + event.layerY,
        "offset x" + event.target.offsetLeft
      );
      var pixel = this.vueCanvas.getImageData(x, y, 1, 1);
      var data = pixel.data;
      console.log(this.vueCanvas.canvas);
      console.log("rgba" + data[0] + "g:" + data[1] + "b:" + data[2]);
      return data;
    },
    fillCircle() {
      const xoffset =20;
      
      this.vueCanvas2.lineWidth = 1;
      this.vueCanvas2.fillStyle = "#FFFFFF";

      // BLUE
      for (var y = 1; y < 300; y+= xoffset) {
       var rdmX= 5+Math.ceil(Math.random()*3);
          console.log(rdmX);
        for (var x = 1; x < this.vueCanvas2.canvas.width; x += xoffset) {
           var rdmY= Math.ceil(Math.random()*5);
         // this.vueCanvas2.fillRect(x, y, 6, 6);
         var rdmYpos=Math.ceil(Math.random()*6)-3;
          this.vueCanvas2.lineWidth = rdmX-rdmY;
          this.vueCanvas2.strokeRect(x, y+rdmYpos, 6+rdmY, 6+rdmY);
          this.vueCanvas2.fillRect(x+(-1+rdmY)/2,y+(rdmY-1)/2+rdmYpos,7,7);
        }
 
      }
    },
  },
};
</script>

<style>
canvas {
  width: 600px;
  height: 600px;
  border: 1px solid black;
}
</style>