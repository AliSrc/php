Vue.component('task', {
    template: '<li><slot></slot></li>'
});

let ali =  new Vue({
    el:'#root',
    data : {
        message :''
    }
});
