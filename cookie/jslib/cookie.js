var Cookie = {
    set: function(key, val, expireDays, path) {
        //判断是否设置expireDays
        if (expireDays) {
            var date = new Date();
            date.setTime(date.getTime() + expireDays*24*3600*1000); //格式化时间
            var expiresStr = "expires="+date.toGMTString() + ";";
        } else {
            var expiresStr = "";
        }
        // 判断是否设置路径
        if (path) {
            var pathStr = "path="+path+";";
        }
        
        document.cookie = key + "=" + encodeURIComponent(val)+";"+expiresStr + pathStr;
    },
    get: function(key) {
        //var getCookie = document.cookie.split(/; /g);
        var getCookie = document.cookie.replace(/[ ]/g, '');
        var resArr = getCookie.split(";");
        var res;
        for (var i=0, len=resArr.length; i<len; i++) {
            var arr = resArr[i].split("=");
            if (arr[0]==key) {
                res = arr[1];
                break;
            }
        }
        return res;
    }
};