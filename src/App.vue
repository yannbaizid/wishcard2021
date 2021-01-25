<template>
  <div id="app">
    <wish-card v-if="false" />
<div @click="generateText"> UN AUTRE</div>
{{text}}
  </div>
</template>

<script>
import WishCard from "./views/WishCard.vue";
import webcontroller from "./services/webcontroller.js";
export default {
  components: { WishCard },
  data() {
    return {
      qualityList: [],
      text: "",
      adjective: {}
    };
  },
  async mounted() {
  this.generateText();
  },
  methods: {
    async generateText() {
        await webcontroller.getQualityList(5).then((response) => {
      console.log(response);
      this.qualityList = response;
    });

    await webcontroller.getAdjective().then((response) => {
      console.log(response);
      this.adjective = response;
    });

var rdmIndex = Math.ceil(Math.random()*(this.qualityList.length-2));
    this.text = "Nous vous souhaitons";
    for (var i = 0; i < this.qualityList.length; i++) {
      if (i > 0 && i < this.qualityList.length - 1) {
        this.text += ",";
      }
      
      if (i == this.qualityList.length - 1) {
        this.text += " et ";
      }

      this.text+=" "+this.qualityList[i].text;
      if (i == this.qualityList.length - 1) {
        this.text += ". C'est important, "+this.qualityList[i].text+".";
      }
        if (i==rdmIndex) {
          this.text+=" ("+this.adjective.text+")";
  
        }
    }
    console.log(this.text);
    }
  }
};
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
