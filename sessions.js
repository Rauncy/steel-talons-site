function createSession(ip, id){
  this.ip = ip;
  this.id = id;

  return this;
}

var sessions = [];

var ipMap = {keys : [], values : []};
var idMap = {keys : [], values : []};
var uidMap = {keys : [], values : []};

/*

*/

function find(list, data){
  //Binary Search
  let i = Math.floor(list.length/2), top = list.length, bot = 0;
  while(top>=bot && list[i]!=data){
    if(list[i]<data){
      top = i-1;
    }else{
      bot = i+1;
    }
    i=Math.floor((top+bot)/2);
  }
  if(top<bot) return -1;
  else return i;
}

function insert(val, arr){
  //Binary Select
  let i = Math.floor(list.length/2), top = list.length, bot = 0;
  while(top>=bot && list[i]!=data){
    if(list[i]<data){
      top = i-1;
    }else{
      bot = i+1;
    }
    i=Math.floor((top+bot)/2);
  }
  if(top<bot) return -1;
  else return i;
}
