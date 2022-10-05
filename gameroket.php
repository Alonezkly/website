<html>
<head>
<title>GAME BY Fathan Raffi</title>
<body bgcolor="black"><!-- tok2_user_contents -->
<div id="tok2_user_contents">

 <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
</head> 
<body> 
 <canvas style="left:0;top:0;position:fixed;background:#333;"></canvas> 
 <script type="text/javascript">
var t = setInterval(function() {
if (innerWidth && innerHeight) {
w = innerWidth;
h = innerHeight;
x = Math.min(w, h);
score = 0;
speed = 1;
asteroids = [];
obstacles = [];
start = true;
gameover = false;
num = 16;
fly = false;
counter = 0;
color = "";
rgb = [250,250,250,1];
for (let i = 0; i < num; i++) {
asteroids.push(new Asteroid(rand(0,w),rand(0,h)));
}
init();
draw();
addEventListener("mousedown", function() {
song.play();
});
addEventListener("ontouchstart" in document?"touchstart":"mousedown", function() {
if (start || gameover) {
start = false;
gameover = false;
score = 0;
speed = 1;
player = new Ship(w/2, h/2);
for (let i = 0; i < num; i++) {
obstacles[i] = new Obstacle(w*2+i*x,rand(x/4,h-x/4),x/5);
}
}
fly = true;
});
addEventListener("ontouchstart" in document?"touchend":"mouseup", function() {
fly = false;
});
clearInterval(t);
}
});
function rand(min,max) {
return Math.random() * (max - min) + min;
}
function init() {
c = document.querySelector("canvas");
c.width = w;
c.height = h;
ctx = c.getContext("2d");
}
function draw() {
ctx.clearRect(0, 0, c.width, c.height);
for (let asteroid of asteroids)
asteroid.update();
if (start) {
ctx.beginPath();
ctx.fillStyle = "gold";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = "bold " + x/6 + "px monospace";
ctx.fillText("Fathan Raffi", c.width/2, c.height/4);
ctx.beginPath();
ctx.fillStyle = "white";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = x/12 + "px monospace";
ctx.fillText(Date.now()%2000<1000?"SELAMAT DATANG DI GAME SAYA":"PENCET UNTUK MEMULAI", c.width/2, c.height/2);
} else if(gameover) {
ctx.beginPath();
ctx.fillStyle = "red";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = "bold " + x/7 + "px monospace";
ctx.fillText("GAME ROKET", c.width/2, c.height/4);
ctx.beginPath();
ctx.fillStyle = "violet";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = "bold "+x/9 + "px monospace";
ctx.fillText("Score: "+score, c.width/2, c.height/4*3);
ctx.beginPath();
ctx.fillStyle = "white";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = x/12 + "px monospace";
ctx.fillText(Date.now()%2000<1000?"YAHH KALAH :(":" Made By Fathan Raffi", c.width/2, c.height/2);
} else {
changeColor();
for (let obstacle of obstacles)
obstacle.update();
player.update();
ctx.beginPath();
ctx.fillStyle = "violet";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = "bold "+x/7 + "px monospace";
ctx.fillText(score, c.width/2, c.height/10);
}
requestAnimationFrame(draw);
}
function Asteroid(x,y) {
this.x = x;
this.y = y;
this.angle = 0;
}
Asteroid.prototype.draw = function() {
ctx.save();
ctx.beginPath();
ctx.translate(this.x, this.y);
ctx.rotate(this.angle);
ctx.fillStyle = "GREY";
for (let i = 0; i < 6; i++) {
i==0?ctx.moveTo(0.05*x*Math.cos(2*Math.PI*i/6), 0.05*x*Math.sin(2*Math.PI*i/6)):ctx.lineTo(0.05*x*Math.cos(2*Math.PI*i/6), 0.05*x*Math.sin(2*Math.PI*i/6));
}
ctx.closePath();
ctx.fill();
ctx.restore();
}
Asteroid.prototype.update = function() {
this.angle -= 0.01;
this.x -= x/360*speed;
if (this.x < -x/20) {
this.x = c.width+x/20;
this.y = rand(0,c.height);
}
this.draw();
}
function Ship(x,y) {
this.x = x;
this.y = y;
this.angle = 0;
this.velX = 0;
this.velY = 0;
}
Ship.prototype.draw = function() {
ctx.save();
ctx.translate(this.x, this.y);
ctx.rotate(this.angle);
ctx.beginPath();
ctx.fillStyle = "white";
ctx.moveTo(x/29,x/50);
ctx.lineTo(x/29,-x/50);
ctx.lineTo(-x/20,-x/56);
ctx.lineTo(-x/20,x/56);
ctx.closePath();
ctx.fill();
ctx.beginPath();
ctx.fillStyle = "red";
ctx.moveTo(-x/20,x/56);
ctx.lineTo(-x/18,x/28);
ctx.lineTo(0,x/50);
ctx.closePath();
ctx.fill();
ctx.beginPath();
ctx.fillStyle = "red";
ctx.moveTo(-x/20,-x/56);
ctx.lineTo(-x/18,-x/28);
ctx.lineTo(0,-x/50);
ctx.closePath();
ctx.fill();
ctx.beginPath();
ctx.fillStyle = "red";
ctx.moveTo(x/12,0);
ctx.lineTo(x/30,x/48);
ctx.lineTo(x/30,-x/48);
ctx.closePath();
ctx.fill();
ctx.beginPath();
ctx.fillStyle = "lightblue";
ctx.arc(x/84,0,x/100,0,2*Math.PI);
ctx.fill();
if (fly) {
ctx.beginPath();
ctx.fillStyle = "orange";
ctx.moveTo(-x/20,-x/72);
ctx.lineTo(-x/20,x/72);
ctx.lineTo(-x/9+rand(-x/128,x/128),0);
ctx.closePath();
ctx.fill();
}
ctx.beginPath();
ctx.rotate(Math.PI/2);
ctx.fillStyle = "black";
ctx.textBaseline = "middle";
ctx.textAlign = "center";
ctx.font = "bold " + (x/60) + "px monospace";
ctx.fillText("69", 0, x/32);
ctx.restore();
}
Ship.prototype.update = function() {
this.angle = Math.atan(this.velY/(x/160)) * 0.6;
if (fly) {
if (this.velY > 0) this.velY *= 0.8;
if (this.velY < x/90) this.velY -= x/900;
}
this.velY += x/1600;
this.x += this.velX;
this.y += this.velY;
this.draw();
}
function Obstacle(x,y,h) {
this.x = x;
this.y = y;
this.h = h;
this.passed = false;
}
Obstacle.prototype.draw = function() {
ctx.beginPath();
ctx.fillStyle = color;
ctx.moveTo(this.x,this.y);
ctx.lineTo(this.x + Math.tan(Math.PI/6)*(c.height-this.y),c.height);
ctx.lineTo(this.x - Math.tan(Math.PI/6)*(c.height-this.y),c.height);
ctx.closePath();
ctx.moveTo(this.x,this.y-this.h);
ctx.lineTo(this.x + Math.tan(Math.PI/6)*(this.y-this.h),0);
ctx.lineTo(this.x - Math.tan(Math.PI/6)*(this.y-this.h),0);
ctx.closePath();
ctx.fill();
}
Obstacle.prototype.detectCol = function() {
if (insidePath([this.x,this.y,this.x + Math.tan(Math.PI/6)*(c.height-this.y),c.height,this.x - Math.tan(Math.PI/6)*(c.height-this.y),c.height], player.x, player.y) || insidePath([this.x,this.y-this.h,this.x + Math.tan(Math.PI/6)*(this.y-this.h),0,this.x - Math.tan(Math.PI/6)*(this.y-this.h),0], player.x, player.y) || player.y > c.height || player.y < 0) {
gameover = true;
}
}
Obstacle.prototype.update = function() {
if (!this.passed) {
if (this.x < player.x) {
this.passed = true;
score++;
}
}
if (this.x < -x) {
this.passed = false;
this.x += x * num;
this.y = rand(x / 4, h - x / 4);
}
this.x -= speed * x / 120;
this.detectCol();
this.draw();
}
function changeColor() {
if (counter++ == 500) {
speed += 0.1 / speed;
counter = 0;
}
if (counter % 10 == 0) {
if (rgb[3]) {
if (rgb[0] < 250) {
rgb[0] += 2;
} else if (rgb[1] < 250) {
rgb[1] += 2;
} else if (rgb[2] < 250) {
rgb[2] += 2;
} else {
rgb[3] = 0;
}
} else {
if (rgb[0] > 100) {
rgb[0] -= 2;
} else if (rgb[1] > 100) {
rgb[1] -= 2;
} else if (rgb[2] > 100) {
rgb[2] -= 2;
} else {
rgb[3] = 1;
}
}
color = "rgb("  + rgb[0] + "," + rgb[1] + "," + rgb[2] + ")";
}
}
function insidePath(path, x, y) {
var count = 0;
var x1 = path[path.length - 2];
var y1 = path[path.length - 1];
var x2 = path[0];
var y2 = path[1];
if ((y - y1) * (y - y2) <= 0 && (x <= x1 || x <= x2) && (x1 >= x && x2 >= x || (x2 - x1) * (y - y1) / (y2 - y1) >= x - x1)) count++;
for (var i=2; i < path.length; i += 2) {
var x1 = path[i - 2];
var y1 = path[i - 1];
var x2 = path[i];
var y2 = path[i + 1];
if ((y - y1) * (y - y2) <= 0 && (x <= x1 || x <= x2) && (x1 >= x && x2 >= x || (x2 - x1) * (y - y1) / (y2 - y1) >= x - x1)) count++;
}
return count % 2;
}
</script> 
</body>
</html>
