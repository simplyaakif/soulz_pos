import{L as _,_ as u}from"./Sidebar.3e859ab2.js";import{o as r,d as o,b as e,z as m,x as a,c as h,w as f,a as s,u as d,A as g,F as p,B as y,H as x}from"./app.92ab7643.js";import{r as v}from"./EmojiSadIcon.2dea6cec.js";const b={class:"bg-white rounded-t"},w={class:"h-28 w-full bg-gray-200 rounded-t"},k=["src"],O={class:"p-4"},$={__name:"OrderHistoryItem",props:{order:Object},setup(t){return(i,c)=>(r(),o("div",b,[e("div",w,[t.order.cart_items[0].variation_item.item.file_url?(r(),o("img",{key:0,class:"w-full h-full",src:t.order.cart_items[0].variation_item.item.file_url,alt:""},null,8,k)):m("",!0)]),e("div",O,[e("div",null," Items Ordered: "+a(t.order.cart_items.length),1),e("div",null," Amount : "+a(t.order.total_amount)+" Rs ",1)])]))}},B={class:"hidden md:block w-full mx-auto flex"},H={class:"w-1/12 border-r border-gray-50 py-10 h-screen"},L={class:"w-11/12 bg-gray-50"},N=e("h2",{class:"p-8 pb-4 text-2xl font-bold text-gray-600"},"Today's Orders",-1),V={class:"grid grid-cols-4 gap-4 p-8 pt-4"},C={class:"bg-gray-100 inset-0 h-screen flex justify-center items-center lg:hidden"},S={class:"flex flex-col items-center p-8 text-center text-gray-500"},j=y(" Kindly use a Laptop, Or Desktop Computer to use Software "),I={__name:"OrderHistory",props:["orders"],setup(t){return(i,c)=>(r(),h(_,null,{default:f(()=>[s(d(x),{title:"Order History Screen"}),e("div",B,[e("div",H,[s(u)]),e("div",L,[N,e("div",V,[(r(!0),o(p,null,g(t.orders,(l,n)=>(r(),o("div",{key:n},[s($,{order:l},null,8,["order"])]))),128))])])]),e("div",C,[e("div",S,[s(d(v),{class:"w-20 h-20 text-gray-500"}),j])])]),_:1}))}};export{I as default};