<div class="row pt-5">
    <div class="col-lg-8 col-12">
        <div class="border border-dark rounded-3">
            <div class="bg-dark-green rounded-3 px-2 d-flex justify-content-start align-items-center">
                <button onclick="selectModel('coke')" id="coke-btn" class="btn border-0 rounded-0 active" data-triggers>Coke</button>
                <button onclick="selectModel('fanta')" id="fanta-btn" class="btn border-0 rounded-0" data-triggers>Fanta</button>
                <button onclick="selectModel('sprite')" id="sprite-btn" class="btn border-0 rounded-0" data-triggers>Sprite</button>
                <button onclick="selectModel('coke-2')" id="coke-2-btn" class="btn border-0 rounded-0" data-triggers>Coke 2.0</button>

                <button onclick="playAudio()" class="ms-auto btn border-0 rounded-0 d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="p-2">
                <h2 id="activeModel">Coke X3D Model</h2>
                <div class="position-relative">
                    <div id="x3d-lighting" class="position-absolute top-0 bottom-0 start-0 end-0" style="background-color: black; z-index: 10000; opacity: 0; pointer-events: none"></div>
                    <x3d id="x3d" width="100%">
                        <scene>
                            <Viewpoint id="front" position="0.16072 0.01626 -0.47503" orientation="-0.01422 0.99980 0.01430 2.81504" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>
                            <Viewpoint id="right" position="-0.50173 -0.00043 0.00391" orientation="0.00250 -1.00000 -0.00166 1.56301" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>
                            <Viewpoint id="back" position="0.08857 0.01321 0.49369" orientation="-0.14510 0.98906 0.02643 0.17951" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>
                            <Viewpoint id="left" position="0.50099 -0.00522 0.02698" orientation="0.01252 0.99992 0.00221 1.51700" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>
                            <Viewpoint id="top" position="-0.00180 0.50173 0.00347" orientation="-0.11583 0.69971 0.70498 2.91437" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>
                            <Viewpoint id="bottom" position="0.00913 -0.50166 -0.00102" orientation="0.08280 0.70620 -0.70315 2.95128" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>

                            <?php
                            foreach($models as $key => $model) {
                                $visible = ($key === 0) ? 'true' : 'false';

                                echo '
                                <transform id="'.strtolower($model['name']).'" DEF="'.strtolower($model['name']).'" render="'.$visible.'" data-model>
                                    <inline nameSpaceName="'.strtolower($model['name']).'" mapDEFToID="true" url="/~gu33'.$model['path'].'"></inline>
                                </transform>';
                            }
                            ?>
                            <timeSensor id="rotation_clock" enabled="true" stopTime="1" DEF='clock' cycleInterval='8' loop='true'></timeSensor>
                            <OrientationInterpolator DEF='spinThings' key='0 0.25 0.5 0.75 1' keyValue='0 1 0 0  0 1 0 1.57079  0 1 0 3.14159  0 1 0 4.71239  0 1 0 6.28317'></OrientationInterpolator>
                            <Route fromNode='clock' fromField='fraction_changed' toNode='spinThings' toField='set_fraction'></Route>
                            <Route fromNode='spinThings' fromField='value_changed' toNode='coke' toField='set_rotation'></Route>
                            <Route fromNode='spinThings' fromField='value_changed' toNode='fanta' toField='set_rotation'></Route>
                            <Route fromNode='spinThings' fromField='value_changed' toNode='sprite' toField='set_rotation'></Route>

                            <timeSensor id="scale_clock" enabled="true" stopTime="1" DEF='clock' cycleInterval='8' loop='true'></timeSensor>
                            <PositionInterpolator DEF='scaleThings' key='0 0.25 0.5 0.75 1' keyValue='1 1 1  1.25 1.25 1.25  1 1 1  1.25 1.25 1.25  1 1 1'></PositionInterpolator>
                            <Route fromNode='clock' fromField='fraction_changed' toNode='scaleThings' toField='set_fraction'></Route>
                            <Route fromNode='scaleThings' fromField='value_changed' toNode='coke' toField='scale'></Route>
                            <Route fromNode='scaleThings' fromField='value_changed' toNode='fanta' toField='scale'></Route>
                            <Route fromNode='scaleThings' fromField='value_changed' toNode='sprite' toField='scale'></Route>
                        </scene>
                    </x3d>

                    <div id="coke-2" class="d-none justify-content-center align-items-center pb-2">
                        <video src="/~gu33/videos/coke.mp4" width="100%" height="500" autoplay muted loop controls></video>
                    </div>
                </div>

                <p id="activeModelDescription">This X3D model of the coke can has been created in 3ds Max, exported to VRML97 and converted, using the instantreality transcoders, to X3D for display online.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 mt-lg-0 mt-4">
        <div class="border border-dark rounded-3">
            <div class="bg-dark-green rounded-3 px-2 py-2 d-flex justify-content-start align-items-center">
                <strong>Camera Views</strong>
            </div>

            <div class="p-2">
                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="front" id="orientation-1" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-1">Front</label>

                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="back" id="orientation-3" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-3">Back</label>

                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="left" id="orientation-4" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-4">Left</label>

                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="right" id="orientation-2" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-2">Right</label>

                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="top" id="orientation-5" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-5">Top</label>

                <input type="radio" class="btn-check" name="orientation" onchange="handleOrientation()" value="bottom" id="orientation-6" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="orientation-6">Bottom</label>
            </div>
        </div>
        <div class="border border-dark rounded-3 mt-3">
            <div class="bg-dark-green rounded-3 px-2 py-2 d-flex justify-content-start align-items-center">
                <strong>Render</strong>
            </div>

            <div class="p-2">
                <input type="radio" class="btn-check" name="render" onchange="handleRender()" value="default" id="render-1" autocomplete="off" checked>
                <label class="btn btn-site-primary mb-2" for="render-1">Default</label>

                <input type="radio" class="btn-check" name="render" onchange="handleRender()" value="wire" id="render-3" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="render-3">Wireframe</label>
            </div>
        </div>
        <div class="border border-dark rounded-3 mt-3">
            <div class="bg-dark-green rounded-3 px-2 py-2 d-flex justify-content-start align-items-center">
                <strong>Animations</strong>
            </div>

            <div class="p-2">
                <input type="radio" class="btn-check" name="animation" onchange="handleAnim()" value="" id="none" autocomplete="off" checked>
                <label class="btn btn-site-primary mb-2" for="none">None</label>

                <input type="radio" class="btn-check" name="animation" onchange="handleAnim()" value="rotation" id="rotation" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="rotation">Rotation</label>

                <input type="radio" class="btn-check" name="animation" onchange="handleAnim()" value="scale" id="scale" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="scale">Scale</label>

                <input type="radio" class="btn-check" name="animation" onchange="handleAnim()" value="all" id="all" autocomplete="off">
                <label class="btn btn-site-primary mb-2" for="all">All</label>
            </div>
        </div>
        <div class="border border-dark rounded-3 mt-3" data-slider>
            <div class="bg-dark-green rounded-3 px-2 py-2 d-flex justify-content-start align-items-center">
                <label for="lighting-slider"><strong>Lighting | <span class="slider-value">100%</span></strong></label>
            </div>

            <div class="p-2">
                <div class="slider-wrapper">
                    <input type="range" min="1" max="100" value="100" class="slider" id="lighting-slider" oninput="slide(this);lighting(this)">
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>
    let activeModel = 'coke';

    const modelDescriptions = {
        coke: "<?php echo array_values(array_filter($models, function($model) { return $model['name'] === 'Coke'; }))[0]['description'] ?>",
        fanta: "<?php echo array_values(array_filter($models, function($model) { return $model['name'] === 'Fanta'; }))[0]['description'] ?>",
        sprite: "<?php echo array_values(array_filter($models, function($model) { return $model['name'] === 'Sprite'; }))[0]['description'] ?>",
        'coke-2': "This is a video of a coke can rotating that was found on YouTube.",
    }

    function selectModel(id) {
        if(activeModel === id) return;

        let x3d = $('#x3d');
        let model = $(`#${id}`);
        let btn = $(`#${id}-btn`);
        if(!model) return;

        let models = $('[data-model]');
        let buttons = $('[data-triggers]');

        models.each(function() {
            $(this).attr('render', 'false')
        })
        buttons.each(function() {
            $(this).removeClass('active');
        })
        if(id === 'coke-2') {
            model.removeClass('d-none');
            model.addClass('d-flex');
            model.trigger('play');
            x3d.addClass('d-none');
            $('#activeModel').text('3D Coke Video')

        }else {
            x3d.removeClass('d-none');
            $('#coke-2').removeClass('d-flex');
            $('#coke-2').addClass('d-none');
            $('#coke-2').trigger('pause');
            model.attr('render', 'true');
            $('#activeModel').text(capitalize(activeModel) + ' X3D Model')
            playAudio();
        }

        btn.addClass('active');
        activeModel = id;
        $('#activeModelDescription').text(modelDescriptions[activeModel])
    }

    function handleOrientation() {
        let orientation = $('input[name=orientation]:checked').val();

        $(`#${orientation}`).attr('set_bind','true')
    }

    function handleRender() {
        let render = $('input[name=render]:checked').val();
        let x3d = $('#x3d')[0];

        switch (render) {
            case 'default':
                x3d.runtime.togglePoints(false)
                break
            case 'wire':
                x3d.runtime.togglePoints(true)
                break;
        }
    }

    function handleAnim() {
        let anim = $('input[name=animation]:checked').val();

        let rotTimeSensor = $('#rotation_clock');
        let scTimeSensor = $('#scale_clock');

        switch (anim) {
            case 'rotation':
                rotTimeSensor.attr('stopTime', '0');
                scTimeSensor.attr('stopTime', '1');
                break;
            case 'scale':
                rotTimeSensor.attr('stopTime', '1');
                scTimeSensor.attr('stopTime', '0');
                break;
            case 'all':
                rotTimeSensor.attr('stopTime', '0');
                scTimeSensor.attr('stopTime', '0');
                break;
            default:
                rotTimeSensor.attr('stopTime', '1');
                scTimeSensor.attr('stopTime', '1');
                break;
        }
    }

    let audio = new Audio('/~gu33/audio/coke-can-open.wav');
    audio.volume = 0.25;

    function playAudio() {
        if(!audio.paused) return;
        audio.play();
    }

    function slide(slider) {
        let sliderValue = $(slider).closest('[data-slider]').find('.slider-value');
        sliderValue.text(slider.value + '%')
    }

    function lighting(slider) {
        let x3dLighting = $('#x3d-lighting');
        let opacity = 1 - (slider.value / 100)

        x3dLighting.css({ opacity: opacity })
    }

    function capitalize(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

</script>
