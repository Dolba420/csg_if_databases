<script>
function getRandomImage() {

var randomImage = new Array();

randomWin[0] = "foto/win.mp4";
randomWin[1] = "foto/win1.mp4";
randomWin[2] = "foto/winheerlijk.mp4";
randomImage[3] = "https://images.unsplash.com/photo-1543877087-ebf71fde2be1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60";
randomImage[4] = "https://wi.wallpapertip.com/wsimgs/156-1565522_puppies-desktop-wallpaper-desktop-background-puppies.jpg";
randomImage[5] = "https://images.unsplash.com/photo-1501265976582-c1e1b0bbaf63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60";


var number = Math.floor(Math.random()*randomImage.length);

document.getElementById("result").innerHTML = '<source src="'+randomWin[number]+'" />';
}
