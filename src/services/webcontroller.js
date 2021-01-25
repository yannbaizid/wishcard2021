import axios from 'axios'


export default {
   async  getQualityList(number) {
        return axios
            .get("qualityManager.php", { params: { 'number': number } })
            .then((response) => {
                console.log('api.js');
                console.log(response);
                return response.data;
            });
    },
   async  getAdjective() {
        return axios
            .get("adjectiveManager.php")
            .then((response) => {
                console.log('api.js');
                console.log(response);
                return response.data;
            });
    }
}