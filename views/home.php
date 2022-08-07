<div class="pt-5">
    <h1 class="text-center">3D Models, made easy</h1>
    <div class="row">
        <div class="col-md-8 col-10 mx-auto">
            <p class="lead text-center">Want to look for assets for your project? We've made that easier by including the full 3D compatibility right on your browser. Pretty cool.. right?</p>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center pt-4">
        <a href="/~gu33/3dapp/assignment/index.php?page=models" class="text-center mx-auto btn btn-primary">Start viewing models</a>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            <x3d id="x3d" width="100%">
                <scene>
                    <Viewpoint id="front" position="0.16072 0.01626 -0.47503" orientation="-0.01422 0.99980 0.01430 2.81504" centerOfRotation="0.00000 0.00000 0.00000" fieldOfView="0.78540" description="camera"></Viewpoint>

                    <transform DEF="coke">
                        <inline nameSpaceName="coke" mapDEFToID="true" url="/~gu33/x3d/coke/coke.x3d"></inline>
                    </transform>
                    <timeSensor id="clock" enabled="true" DEF='clock' cycleInterval='8' loop='true'></timeSensor>
                    <OrientationInterpolator DEF='spinThings' key='0 0.25 0.5 0.75 1' keyValue='0 1 0 0  0 1 0 1.57079  0 1 0 3.14159  0 1 0 4.71239  0 1 0 6.28317'></OrientationInterpolator>
                    <Route fromNode='clock' fromField='fraction_changed' toNode='spinThings' toField='set_fraction'></Route>
                    <Route fromNode='spinThings' fromField='value_changed' toNode='coke' toField='set_rotation'></Route>
                </scene>
            </x3d>
        </div>
    </div>
</div>