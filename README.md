# Cookie和Session详解

# 一、前言

## HTTP简述
HTTP是无状态协议，说明它不能以状态来区分和管理请求和响应。也就是说无法根据状态进行本次的请求处理。不可否认无状态协议当然也有它的优点，由于不必保存状态，自然可减少服务器的CPU及内存资源的消耗。从另一侧面来说，也正是因为HTTP协议本身是非常简单的，所以才会被用在各种场景。

![](https://pic2.zhimg.com/80/v2-dde997503ed9d450e2f39042d53d4307_hd.jpg)

我们登录淘宝的时候首先要登录，我们看到了一个商品点进去，进行了页面跳转/刷新，按照HTTP的无状态协议岂不是又要登录一次？所以为了解决这个问题，Cookie诞生了，在保留无状态协议这个特征的同时又要解决类似记录状态的矛盾问题。Cookie技术通过在请求和响应报文中写入Cookie信息来控制客户端的状态。

## Cookie简述
Cookie会根据从服务端发送的响应报文内的一个叫做**Set-Cookie首部字段**信息，通知客户端保存Cookie。当下次客户端再往该服务器发送请求时，客户端会自动在请求报文中加入Cookie值后发送出去。

- 没有Cookie信息状态下的请求

![](https://pic4.zhimg.com/80/v2-85622297a93f493c891ffb90b67fd5e0_hd.jpg)

- 第二次以后（存有Cookie信息状态的请求）

![](https://pic4.zhimg.com/80/v2-1f49734871c5e2da2d264d28ac310a65_hd.jpg)

上图很清晰地展示了发送Cookie交互的情景。HTTP请求报文和响应报文的内容如下（数字和途中对应）

①请求报文（没有Cookie 信息的状态）

```
GET /reader/ HTTP/1.1
Host: hackr.jp
*首部字段内没有Cookie的相关信息
```

②响应报文（服务器端生成Cookie 信息）

```
HTTP/1.1 200 OK
Date: Thu, 12 Jul 2012 07:12:20 GMT
Server: Apache
＜Set-Cookie: sid=1342077140226724; path=/; expires=Wed,10-Oct-12 07:12:20 GMT＞
Content-Type: text/plain; charset=UTF-8
```

③请求报文（自动发送保存着的Cookie 信息）

```
GET /image/ HTTP/1.1
Host: hackr.jp
Cookie: sid=1342077140226724
```

## Session简述

### 什么是Session

在计算机中，尤其是在网络应用中，成为会话控制。Session对象存储特定用户会话所需的属性及配置信息。这样，当用户在应用程序之间的Web页之间跳转时，存储在会话Session对象中的变量将不会丢失，而是在整个用户会话中一直存在下去。当用户请求来自应用程序的Web页时，如果该用户还没有会话，则Web服务器将自动创建一个Session对象。Session对象的一个最常见用法就是存储用户的首选项。

### 通过Cookie来管理Session

基于表单认证的标准规范尚未有定论，一般会使用Cookie来管理Session(会话)。基于表单认证本身是通过服务端的web应用，将客户端发送过来的用户ID和密码与之前登录过的信息做匹配进行认证的。但HTTP是无状态协议，之前已认证过的用户状态无法通过协议层面保存下来。既无法实现状态管理，因此即使当该用户下一次继续访问，也无法区分他与其他的用户。于是我们会用Cookie来管理Session，以弥补HTTP协议中不存在的状态管理功能。

![](https://pic4.zhimg.com/80/v2-0b02fa4a73a8072eb03cdf78270235e1_hd.jpg)

## HTML5 localStorage和sessonStorage

 HTML5中的Web Storage包括了两种存储方式：sessionStorage和localStorage。在window对象中，localStorage对应window.localStorage, sessionStorage对应window.sessionStorage。

 sessionStorage用于本地存储一个会话(session)中的数据，这些数据只有在同一个会话的页面才能访问并且当会话结束后数据也随之销毁。因此sessionStorage不是一种持久化的本地存储，仅仅是会话级别的存储。localStorage是用于持久化的本地存储，除非主动删除数据，否则数据永不过期。

 web storage和cookie的区别：Web Storage的概念和cookie相似，区别是它是为了更大容量存储设计的。Cookie的大小是受限的，并且每次你请求一个新的页面的时候Cookie都会被发送过去，这样无形中浪费了带宽。web storage一般为5M,cookie为4K。

 ## 参考文献
 [认识HTTP----Cookie和Session篇](https://zhuanlan.zhihu.com/p/27669892?utm_source=com.daimajia.gold&utm_medium=social)
 
 [localstorage 必知必会](https://juejin.im/post/5a9fcc5e51882555602074e3)