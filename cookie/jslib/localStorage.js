// var Custom_localStorage = {
//     set: function(key, value) {
//         /**
//          * 考虑到对象的字符化和解析的问题，
//          * 统一将值封装为对象
//          */
//         var item= {
//             data: value
//         };

//         localStorage.setItem(key, JSON.stringify(item));
//     },

//     get: function(key) {
//         var val = localStorage.getItem(key);
        
//         // 如果没有获取到值，直接返回null
//         if(!val) return null;

//         val = JSON.parse(val);
//         return val;
//     }
// }; 
var Custom_localStorage = {
    //添加缓存时间
    set: function(key, value, days) {
        var item = {
            data: value,
            endtime: new Date().getTime() + days*24*3600*1000,
        };
        localStorage.setItem(key, JSON.stringify(item));
    },

    get: function(key) {
        var val = localStorage.getItem(key);
        
        // 如果没有获取到值，直接返回null
        if(!val) return null;

        val = JSON.parse(val);
        if (new Date().getTime() > val.endtime) {
            //当前时间大于endtime，localStorage过期
            val = null;
            localStorage.removeItem(key);
        }
        return val.data;
    },

    remove: function(key) {
        localStorage.removeItem(key);
    },

    removeAll: function() {
        localStorage.clear();
    }
}