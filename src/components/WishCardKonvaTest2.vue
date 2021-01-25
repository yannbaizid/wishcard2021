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
      const xoffset = 5;
      console.log(pixel);
      this.vueCanvas2.lineWidth = 1;
    

      // BLUE
      for (var j = 1; j < 300; j += 6) {
        this.vueCanvas2.beginPath();
        this.vueCanvas2.moveTo(1, j);
        for ( var i = 1; i < this.vueCanvas2.canvas.width; i += xoffset) {
         var pixel = this.vueCanvas.getImageData(i, j, 1, 1);
          var data = pixel.data;
          /* const rgba = `rgba(${data[0]}, ${data[1]}, ${data[2]}, ${
            data[3] / 255
          })`; */
          this.vueCanvas2.strokeStyle = "#000000";
          const avg = Math.PI * (data[2] / 255)/2;
          console.log(avg);
       
        
          this.vueCanvas2.lineTo(
            i - (xoffset * Math.cos(avg))/1.8,
            j - (xoffset * Math.sin(avg))/1.8
          );
          this.vueCanvas2.lineTo(
            i + (xoffset * Math.cos(avg))/1.8,
            j + (xoffset * Math.sin(avg))/1.8
          );
         
          /*        this.vueCanvas2.beginPath();
         this.vueCanvas2.lineWidth = 5-Math.ceil((3*(data[0]+data[1]+data[2]))/255);
          this.vueCanvas2.lineWidth=2;
          this.vueCanvas2.strokeStyle = rgba;
         // this.vueCanvas2.fillStyle = rgba;
          this.vueCanvas2.fillStyle = '#FFFFFF';
          //this.vueCanvas2.arc(i, j, 1, 0, 2 * Math.PI, true);
         this.vueCanvas2.strokeRect(i, j, 4,4);
         // this.vueCanvas2.stroke();
        this.vueCanvas2.fillRect(i, j, Math.ceil((3*(data[0]+data[1]+data[2]))/255),Math.ceil((3*(data[0]+data[1]+data[2]))/255)); */
        }
        this.vueCanvas2.stroke();
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