<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My first 3d_Project1</title>
		<style>
			body { margin: 0; }
			canvas {width: 100%; height: 100%;}
		</style>
		<script src="js/three.js"></script>
		<script src="https://82mou.github.io/threejs/js/OrbitControls.js"></script>
</head>
	<body>
		 <script type="text/javascript">
		

var renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

var scene = new THREE.Scene();
// CAMERA
var camera = new THREE.PerspectiveCamera(75, 320 / 240, 1, 1000);
camera.position.set(250, 200, 250);
camera.lookAt(0, 0, 0);

// add controls for the camera
var controls = new THREE.OrbitControls(camera);
var geometry = new THREE.PlaneGeometry(100, 50);
var material = new THREE.MeshBasicMaterial( { color: 0xFFFFFF } );
var plane = new THREE.Mesh( geometry, material );
scene.add( plane );

camera.position.z = 200;
var width = 100, height = 100, width_segments =1, height_segments = 100;
var plane = new THREE.PlaneGeometry(width, height, width_segments, height_segments);

for(var i=0; i<plane.verticeslength/2; i++) {
    plane.vertices[2*i].position.z = Math.pow(2, i/20);
    plane.vertices[2*i+1].position.z = Math.pow(2, i/20);
}

var mesh = new THREE.Mesh(plane, new THREE.MeshLambertMaterial({color: 0x888888}));
mesh.doubleSided = true;
mesh.rotation.y = Math.PI/2-0.5;
scene.add(mesh);

var animate = function () {
  requestAnimationFrame( animate );

    controls.update();

  // plane.rotation.x += 0.01;
  // plane.rotation.y += 0.01;

  renderer.render( scene, camera );

};

animate();

		</script>
	</body>
</html> 