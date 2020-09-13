import moment from 'moment'
import Vue from 'vue'
Vue.filter('timeformat',(arg)=>{
    return moment(arg).format("MMM Do YYYY")
})

Vue.filter('sortlength',function (text,length,suffix) {
    if(text!==null)
    return text.substring(0,length)+suffix;

})