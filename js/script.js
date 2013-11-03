Array.prototype.indexOf = function(ob) {
    var n=this.length;
     for(var i=0;i<n;i++) {
      if(this[i]==ob)return i;
     }
     return -1;
};
Array.prototype.shuffle = function() {
     var n=this.length,i1,i2;
     for(var i=0;i<n*2;i++) {
      i1=Math.floor(Math.random()*n);
      i2=Math.floor(Math.random()*n);
      var a=this[i1];
      this[i1]=this[i2];
      this[i2]=a;
     }
     return this;
};