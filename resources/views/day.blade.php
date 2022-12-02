@extends('frame')

@section('content')
    @if ($day == null)
        <div class="text-center">
            <h2>A-a, nem csalunk!</h2>
        </div>
    @else
        <div class="">


            <main class="center">

                <canvas id="canvas" width="320px" height="320px">
                </canvas>
                <p id="canvas-background"></p>

            </main>

        
            <div class="fixed-bottom text-center">
                <h3 id="description"> {{ $day->description }} </h3>
            </div>

            <script>
                // Animation frame
                window.requestAnimFrame = (function(callback) {
                    return window.requestAnimationFrame ||
                        window.webkitRequestAnimationFrame ||
                        window.mozRequestAnimationFrame ||
                        window.oRequestAnimationFrame ||
                        window.msRequestAnimaitonFrame ||
                        function(callback) {
                            window.setTimeout(callback, 1000 / 60);
                        };
                })();

                const body = document.getElementById('body');

                // Draw
                const color = "#f70d8a";
                const stroke = 25;

                // Canvas
                const canvas = document.getElementById("canvas");
                let canvasWidth = canvas.offsetWidth;
                let canvasHeight = canvas.offsetHeight;
                const context = canvas.getContext("2d");
                context.fillRect(0, 0, canvasWidth, canvasHeight);
                context.strokeStyle = color;
                context.lineWidth = stroke;
                document.getElementById('canvas-background').innerHTML = "<img class='canvas-image' src={{ $day->base64Image }}>";

                // Mouse events
                var drawing = false;
                var mousePos = {
                    x: 0,
                    y: 0
                };
                var lastPos = mousePos;
                canvas.addEventListener("mousedown", function(e) {
                    drawing = true;
                    lastPos = getMousePos(canvas, e);
                }, false);
                canvas.addEventListener("mouseup", function(e) {
                    drawing = false;
                }, false);
                canvas.addEventListener("mousemove", function(e) {
                    mousePos = getMousePos(canvas, e);
                }, false);

                // Touch events
                canvas.addEventListener("touchstart", function(e) {
                    mousePos = getTouchPos(canvas, e);
                    var touch = e.touches[0];
                    var mouseEvent = new MouseEvent("mousedown", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);
                canvas.addEventListener("touchend", function(e) {
                    var mouseEvent = new MouseEvent("mouseup", {});
                    canvas.dispatchEvent(mouseEvent);
                }, false);
                canvas.addEventListener("touchmove", function(e) {
                    var touch = e.touches[0];
                    var mouseEvent = new MouseEvent("mousemove", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);

                // Prevent default scrolling behavior on Touch events
                document.body.addEventListener("touchstart", function(e) {
                    if (e.target == canvas) {
                        e.preventDefault();
                    }
                }, {
                    passive: false
                });
                document.body.addEventListener("touchend", function(e) {
                    if (e.target == canvas) {
                        e.preventDefault();
                    }
                }, {
                    passive: false
                });
                document.body.addEventListener("touchmove", function(e) {
                    if (e.target == canvas) {
                        e.preventDefault();
                    }
                }, {
                    passive: false
                });

                // Mouse position
                function getMousePos(canvasDom, mouseEvent) {
                    var rect = canvasDom.getBoundingClientRect();
                    return {
                        x: mouseEvent.clientX - rect.left,
                        y: mouseEvent.clientY - rect.top
                    };
                }

                // Touch position
                function getTouchPos(canvasDom, touchEvent) {
                    var rect = canvasDom.getBoundingClientRect();
                    return {
                        x: touchEvent.touches[0].clientX - rect.left,
                        y: touchEvent.touches[0].clientY - rect.top
                    };
                }

                // Draw
                function renderCanvas() {
                    if (drawing) {
                        context.moveTo(lastPos.x, lastPos.y);
                        context.lineTo(mousePos.x, mousePos.y);
                        context.globalCompositeOperation = "destination-out";
                        context.stroke();
                        lastPos = mousePos;
                    }
                }

                // Animation frame
                (function drawLoop() {
                    requestAnimFrame(drawLoop);
                    renderCanvas();
                })();
            </script>

        </div>
    @endif
@endsection
