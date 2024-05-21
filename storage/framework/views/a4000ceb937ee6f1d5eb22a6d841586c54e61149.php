<?php $__env->startPush('page-css'); ?>

<!-- Bootstrap 5.1.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <!-- Profile start -->
        <div class="col-md-2 pe-0 text-break">
            <?php echo $__env->make('doctor.include.patientLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Profile end -->
        <!-- Mid Section start -->
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Tooth Selection</h6>
                <!-- teeth chart start -->
                <div class="chart-teeth">
                    <div class="row mx-0">
                        <div class="col-md-6 p-0">
                            <div class="top-area1" id="top-area-top">
                                <input type="radio" name="tooth-selector" id="radio1" value="Permanent Teeth" checked>
                                <label for="radio1">Permanent Teeth</label>
                                </input>
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="top-area2" id="sec-col-top">
                                <input type="radio" name="tooth-selector" id="radio2" value="Deciduous Teeth">
                                <label for="radio2">Deciduous Teeth</label>
                                </input>
                            </div>
                        </div>
                        <div class="col-md-12 px-0">
                            <div class="row mx-0" id="permanent">
                                <!-- Upper Right -->
                                <div class="col-md-6 p-0 T-border-right">
                                    <div class="upper-right T-border-bottom">
                                        <h4>Upper Right</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <!-- <p>1</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/1TMR.png')); ?>" alt="" id="18" class="tooth_click">
                                                    <p class="mb-0">18</p>
                                                    <input type="checkbox" id="t" name="t" value="18" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>2</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/2SMR.png')); ?>" alt="" id="17" class="tooth_click">
                                                    <p class="mb-0">17</p>
                                                    <input type="checkbox" id="t" name="t" value="17" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>3</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/3FMR.png')); ?>" alt="" id="16" class="tooth_click">
                                                    <p class="mb-0">16</p>
                                                    <input type="checkbox" id="t" name="t" value="16" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>4</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/4SPMR.png')); ?>" alt="" id="15" class="tooth_click">
                                                    <p class="mb-0">15</p>
                                                    <input type="checkbox" id="t" name="t" value="15" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>5</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/5FPMR.png')); ?>" alt="" id="14" class="tooth_click">
                                                    <p class="mb-0">14</p>
                                                    <input type="checkbox" id="t" name="t" value="14" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>6</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/6CR.png')); ?>" alt="" id="13" class="tooth_click">
                                                    <p class="mb-0">13</p>
                                                    <input type="checkbox" id="t" name="t" value="13" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>7</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/7LIR.png')); ?>" alt="" id="12" class="tooth_click">
                                                    <p class="mb-0">12</p>
                                                    <input type="checkbox" id="t" name="t" value="12" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>8</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/8CIR.png')); ?>" alt="" id="11" class="tooth_click">
                                                    <p class="mb-0">11</p>
                                                    <input type="checkbox" id="t" name="t" value="11" style="display:none" class="select t">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Upper Left -->
                                <div class="col-md-6 p-0 T-border-left">
                                    <div class="upper-right T-border-bottom">
                                        <h4>Upper Left</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <!-- <p>9</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/9CIL.png')); ?>" alt="" id="21" class="tooth_click">
                                                    <p class="mb-0">21</p>
                                                    <input type="checkbox" id="t" name="t" value="21" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>10</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/10LIL.png')); ?>" alt="" id="22" class="tooth_click">
                                                    <p class="mb-0">22</p>
                                                    <input type="checkbox" id="t" name="t" value="22" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>11</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/11CL.png')); ?>" alt="" id="23" class="tooth_click">
                                                    <p class="mb-0">23</p>
                                                    <input type="checkbox" id="t" name="t" value="23" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>12</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/12FPML.png')); ?>" alt="" id="24" class="tooth_click">
                                                    <p class="mb-0">24</p>
                                                    <input type="checkbox" id="t" name="t" value="24" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>13</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/13SPML.png')); ?>" alt="" id="25" class="tooth_click">
                                                    <p class="mb-0">25</p>
                                                    <input type="checkbox" id="t" name="t" value="25" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>14</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/14FML.png')); ?>" alt="" id="26" class="tooth_click">
                                                    <p class="mb-0">26</p>
                                                    <input type="checkbox" id="t" name="t" value="26" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>15</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/15SML.png')); ?>" alt="" id="27" class="tooth_click">
                                                    <p class="mb-0">27</p>
                                                    <input type="checkbox" id="t" name="t" value="27" style="display:none" class="select t">
                                                </li>
                                                <li>
                                                    <!-- <p>16</p> -->
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/16TML.png')); ?>" alt="" id="28" class="tooth_click">
                                                    <p class="mb-0">28</p>
                                                    <input type="checkbox" id="t" name="t" value="28" style="display:none" class="select t">
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Lower Right -->
                                <div class="col-md-6 p-0 T-border-right">
                                    <div class="upper-right  mb-3">
                                        <h4>Lower Right</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="48" style="display:none" class="select t">
                                                    <p class="mb-0">48</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/48TMR.png')); ?>" alt="" id="48" class="tooth_click">
                                                    <!-- <p>32</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="47" style="display:none" class="select t">
                                                    <p class="mb-0">47</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/47SMR.png')); ?>" alt="" id="47" class="tooth_click">
                                                    <!-- <p>31</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="46" style="display:none" class="select t">
                                                    <p class="mb-0">46</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/46FMR.png')); ?>" alt="" id="46" class="tooth_click">
                                                    <!-- <p>30</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="46" style="display:none" class="select t">
                                                    <p class="mb-0">45</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/45SPMR.png')); ?>" alt="" id="45" class="tooth_click">
                                                    <!-- <p>29</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="44" style="display:none" class="select t">
                                                    <p class="mb-0">44</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/44FPMR.png')); ?>" alt="" id="44" class="tooth_click">
                                                    <!-- <p>28</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="43" style="display:none" class="select t">
                                                    <p class="mb-0">43</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/43CR.png')); ?>" alt="" id="43" class="tooth_click">
                                                    <!-- <p>27</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="42" style="display:none" class="select t">
                                                    <p class="mb-0">42</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/42LIR.png')); ?>" alt="" id="42" class="tooth_click">
                                                    <!-- <p>26</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="41" style="display:none" class="select t">
                                                    <p class="mb-0">41</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/41CIR.png')); ?>" alt="" id="41" class="tooth_click">
                                                    <!-- <p>25</p> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Lower Left -->
                                <div class="col-md-6 p-0 T-border-left">
                                    <div class="upper-right">
                                        <h4>Lower Left</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="31" style="display:none" class="select t">
                                                    <p class="mb-0">31</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/31CIL.png')); ?>" alt="" id="31" class="tooth_click">
                                                    <!-- <p>24</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="32" style="display:none" class="select t">
                                                    <p class="mb-0">32</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/32LIL.png')); ?>" alt="" id="32" class="tooth_click">
                                                    <!-- <p>23</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="33" style="display:none" class="select t">
                                                    <p class="mb-0">33</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/33CL.png')); ?>" alt="" id="33" class="tooth_click">
                                                    <!-- <p>22</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="34" style="display:none" class="select t">
                                                    <p class="mb-0">34</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/34FPML.png')); ?>" alt="" id="34" class="tooth_click">
                                                    <!-- <p>21</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="35" style="display:none" class="select t">
                                                    <p class="mb-0">35</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/35SPML.png')); ?>" alt="" id="35" class="tooth_click">
                                                    <!-- <p>20</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="36" style="display:none" class="select t">
                                                    <p class="mb-0">36</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/36FML.png')); ?>" alt="" id="36" class="tooth_click">
                                                    <!-- <p>19</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="37" style="display:none" class="select t">
                                                    <p class="mb-0">37</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/37SML.png')); ?>" alt="" id="37" class="tooth_click">
                                                    <!-- <p>18</p> -->
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="t" name="t" value="38" style="display:none" class="select t">
                                                    <p class="mb-0">38</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/38TML.png')); ?>" alt="" id="38" class="tooth_click">
                                                    <!-- <p>17</p> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                            <div class="row mx-0" id="deciduous">
                                <!-- Upper Right -->
                                <div class="col-md-6 p-0 T-border-right">
                                    <div class="upper-right T-border-bottom">
                                        <h4>Upper Right</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/4SPMR.png')); ?>" alt="" id="55" class="tooth_click">
                                                    <p class="mb-0">55</p>
                                                    <input type="checkbox" id="t" name="t" value="55" style="display:none" class="select t">
                                                    <!--<p>A</p>-->
                                                    <!-- <p>15</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/5FPMR.png')); ?>" alt="" id="54" class="tooth_click">
                                                    <p class="mb-0">54</p>
                                                    <input type="checkbox" id="t" name="t" value="54" style="display:none" class="select t">
                                                    <!--<p>B</p>-->
                                                    <!-- <p>14</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/6CR.png')); ?>" alt="" id="53" class="tooth_click">
                                                    <p class="mb-0">53</p>
                                                    <input type="checkbox" id="t" name="t" value="53" style="display:none" class="select t">
                                                    <!--<p>C</p>-->
                                                    <!-- <p>13</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/7LIR.png')); ?>" alt="" id="52" class="tooth_click">
                                                    <p class="mb-0">52</p>
                                                    <input type="checkbox" id="t" name="t" value="52" style="display:none" class="select t">
                                                    <!--<p>D</p>-->
                                                    <!-- <p>12</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-right/8CIR.png')); ?>" alt="" id="51" class="tooth_click">
                                                    <p class="mb-0">51</p>
                                                    <input type="checkbox" id="t" name="t" value="51" style="display:none" class="select t">
                                                    <!--<p>E</p>-->
                                                    <!-- <p>11</p> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Upper Left -->
                                <div class="col-md-6 p-0 T-border-left">
                                    <div class="upper-right T-border-bottom">
                                        <h4>Upper Left</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/9CIL.png')); ?>" alt="" id="61" class="tooth_click">
                                                    <p class="mb-0">61</p>
                                                    <input type="checkbox" id="t" name="t" value="61" style="display:none" class="select t">
                                                    <!--<p>F</p>-->
                                                    <!-- <p>21</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/10LIL.png')); ?>" alt="" id="62" class="tooth_click">
                                                    <p class="mb-0">62</p>
                                                    <input type="checkbox" id="t" name="t" value="62" style="display:none" class="select t">
                                                    <!--<p>G</p>-->
                                                    <!-- <p>22</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/11CL.png')); ?>" alt="" id="63" class="tooth_click">
                                                    <p class="mb-0">63</p>
                                                    <input type="checkbox" id="t" name="t" value="63" style="display:none" class="select t">
                                                    <!--<p>H</p>-->
                                                    <!-- <p>23</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/12FPML.png')); ?>" alt="" id="64" class="tooth_click">
                                                    <p class="mb-0">64</p>
                                                    <input type="checkbox" id="t" name="t" value="64" style="display:none" class="select t">
                                                    <!--<p>I</p>-->
                                                    <!-- <p>24</p> -->
                                                </li>
                                                <li>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Upper-left/13SPML.png')); ?>" alt="" id="65" class="tooth_click">
                                                    <p class="mb-0">65</p>
                                                    <input type="checkbox" id="t" name="t" value="65" style="display:none" class="select t">
                                                    <!--<p>J</p>-->
                                                    <!-- <p>25</p> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Lower Right -->
                                <div class="col-md-6 p-0 T-border-right">
                                    <div class="upper-right">
                                        <h4>Lower Right</h4>
                                        <div class="upper-right-teeths mb-3">
                                            <ul>
                                                <li>
                                                    <!-- <p>45</p> -->
                                                    <!--<p>T</p>-->
                                                    <input type="checkbox" id="t" name="t" value="85" style="display:none" class="select t">
                                                    <p class="mb-0">85</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/45SPMR.png')); ?>" alt="" id="85" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>44</p> -->
                                                    <!--<p>S</p>-->
                                                    <input type="checkbox" id="t" name="t" value="84" style="display:none" class="select t">
                                                    <p class="mb-0">84</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/44FPMR.png')); ?>" alt="" id="84" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>43</p> -->
                                                    <!--<p>R</p>-->
                                                    <input type="checkbox" id="t" name="t" value="83" style="display:none" class="select t">
                                                    <p class="mb-0">83</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/43CR.png')); ?>" alt="" id="83" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>42</p> -->
                                                    <!--<p>Q</p>-->
                                                    <input type="checkbox" id="t" name="t" value="82" style="display:none" class="select t">
                                                    <p class="mb-0">82</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/42LIR.png')); ?>" alt="" id="82" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>41</p> -->
                                                    <!--<p>P</p>-->
                                                    <input type="checkbox" id="t" name="t" value="81" style="display:none" class="select t">
                                                    <p class="mb-0">81</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Right/41CIR.png')); ?>" alt="" id="81" class="tooth_click">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                <!-- Lower Left -->
                                <div class="col-md-6 p-0 T-border-left">
                                    <div class="upper-right">
                                        <h4>Lower Left</h4>
                                        <div class="upper-right-teeths">
                                            <ul>
                                                <li>
                                                    <!-- <p>31</p> -->
                                                    <!--<p>O</p>-->
                                                    <input type="checkbox" id="t" name="t" value="71" style="display:none" class="select t">
                                                    <p class="mb-0">71</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/31CIL.png')); ?>" alt="" id="71" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>32</p> -->
                                                    <!--<p>N</p>-->
                                                    <input type="checkbox" id="t" name="t" value="72" style="display:none" class="select t">
                                                    <p class="mb-0">72</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/32LIL.png')); ?>" alt="" id="72" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>33</p> -->
                                                    <!--<p>M</p>-->
                                                    <input type="checkbox" id="t" name="t" value="73" style="display:none" class="select t">
                                                    <p class="mb-0">73</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/33CL.png')); ?>" alt="" id="73" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>34</p> -->
                                                    <!--<p>L</p>-->
                                                    <input type="checkbox" id="t" name="t" value="74" style="display:none" class="select t">
                                                    <p class="mb-0">74</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/34FPML.png')); ?>" alt="" id="74" class="tooth_click">
                                                </li>
                                                <li>
                                                    <!-- <p>35</p> -->
                                                    <!--<p>K</p>-->
                                                    <input type="checkbox" id="t" name="t" value="75" style="display:none" class="select t">
                                                    <p class="mb-0">75</p>
                                                    <img src="<?php echo e(asset('assets/img/teeths/Lower-Left/35SPML.png')); ?>" alt="" id="75" class="tooth_click">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                            <!-- Tooth Tools Function Start -->
                            <div class="tool-out">
                                <form action="<?php echo e(route('treatment_info',[$doctor_info->id,$patient->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="tools-h">
                                        <div class="row align-items-center">
                                            <div class="col-5 d-flex align-items-center">
                                                <h3 class="pe-0">Tooth No. : </h3>
                                                <input type="text" id="tooth_no" name="tooth_no" value="" readonly />
                                            </div>
                                            <div class="col-5">

                                                <input type="text" id="tooth_side" name="tooth_side" value="" readonly />
                                            </div>
                                            <div class="col-2 text-end">
                                                <i class="fa-solid fa-xmark" id="close-btn"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="d-flex justify-content-between">C/C Cheif Complaint
                                        <div>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint">
                                                <i class="bi bi-card-list"></i>
                                            </a>
                                        </div>
                                    </h5>
                                    <select class="form-control custom-form-control multi" name="pc_c[]" aria-label="Default select example" multiple style="width:100%;">
                                        <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <ul>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                    </ul>
                                    <h5 class="d-flex justify-content-between">C/F Clinical Findings
                                        <div>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">
                                                <i class="bi bi-card-list"></i>
                                            </a>
                                        </div>
                                    </h5>
                                    <select class="form-control custom-form-control multi" name="pc_f[]" aria-label="Default select example" multiple style="width:100%;">
                                        <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <ul>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                    </ul>
                                    <h5 class="d-flex justify-content-between">Investigation
                                        <div>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation">
                                                <i class="bi bi-card-list"></i>
                                            </a>
                                        </div>
                                    </h5>
                                    <select class="form-control custom-form-control multi" name="p_investigation[]" aria-label="Default select example" multiple style="width:100%;">
                                        <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="X-ray"><?php echo e($investigation->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <ul>
                                        <li>X-ray</li>
                                        <li>OPG</li>
                                        <li>CBCT</li>
                                    </ul>

                                    <h5 class="d-flex justify-content-between">T/P Treatment Plans
                                        <div>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">
                                                <i class="bi bi-card-list"></i>
                                            </a>
                                        </div>
                                    </h5>
                                    <select class="form-control custom-form-control multi" name="pt_p[]" aria-label="Default select example" style="width:100%;">
                                        <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <ul>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                        <li>Pain</li>
                                        <li>Check-up</li>
                                    </ul>
                                    <div class="d-flex">
                                        <button class="btn   btn-outline-blue-grey">Submit</button>
                                        <input type="hidden" id="tooth_type" name="tooth_type" value="" readonly />
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- Tooth Tools Function Start -->

                        <!-- Teeth Button -->
                        <div class="col-md-12 teeth-bottom px-0 pt-1">
                            <div class="teeth-btn d-flex">
                                <a class="tooth_click full" id="All">Full Mouth</a>

                                <a class="mul">Multi Teeth</a>
                                <a class="confirm  " style="display:none">Confirm</a>
                                <a class="cancel_btn  " style="display:none">Cancel</a>
                            </div>
                            <!-- <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1">Full Mouth</label>

                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck2">Multi Teeth</label> -->

                            <!-- <button>Multi Teeth</button> -->
                        </div>
                    </div>
                </div>
                <!-- teeth chart end -->
                <!-- Treatment Card start -->
                <div class="treatment-cards my-3">
                    <div class="treatment-cards-h bg-blue-grey p-2">
                        <h4 class="m-0 ">Treatment Plans For <?php echo e($patient->name); ?></h4>
                    </div>
                    <!-- Treatment Plans Status -->
                    <div class="row mx-2">
                        <?php $__empty_1 = true; $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-4 p-0 pt-3 pe-1">
                            <div class="treatment-card d-flex flex-column flex-wrap">
                                <div class="treatment-card-details">
                                    <h4 class="m-0"><?php echo e($treatment_info->tooth_side); ?> Tooth No: <?php echo e($treatment_info->tooth_no); ?></h4>


                                    <p class="fw-bold m-0 ms-1 mt-1 mb-2"><?php echo e($treatment_info->treatment_plans); ?></p>
                                    <!-- <p class="m-0 ms-1">Start : 04/03/2021</p> -->
                                    <p class="fw-bold m-0 ms-1">CC : <span class="fw-normal"><?php echo e($treatment_info->chife_complaints); ?></span></p>
                                    <p class="fw-bold m-0 ms-1">CF : <span class="fw-normal"><?php echo e($treatment_info->clinical_findings); ?></span></p>
                                    <p class="fw-bold m-0 ms-1 mb-2">Investigation : <span class="fw-normal"><?php echo e($treatment_info->investigation); ?></span></p>
                                    <?php if($treatment_info->status == 2): ?>
                                    <p class="m-0 ms-1">Status : <span class="text-success">Done</span></p>
                                    <?php elseif($treatment_info->status == 1): ?>
                                    <p class="m-0 ms-1">Status : <span class="text-success">Progress</span></p>
                                    <?php else: ?>
                                    <p class="m-0 ms-1">Status : <span class="text-success">Not Start</span></p>
                                    <?php endif; ?>
                                </div>
                                <div class="treatment-card-btn d-flex <?php echo e($treatment_info->status == 0 ? 'justify-content-between' : 'justify-content-center'); ?>">

                                    <button type="button" class="btn btn-sm treat_edit <?php echo e($treatment_info->status == 0); ?>" value="<?php echo e($treatment_info->id); ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <a href="<?php echo e(route('treatments',[$doctor_info->id,$patient->id,$treatment_info->id,$treatment_info->treatment_plans])); ?>" class="py-1" style="font-size: 20px;color: #000;">Enter</a>

                                    <button type="button" class="btn btn-sm delete-tp_info <?php echo e($treatment_info->status == 0 ? '' : 'd-none'); ?>" value="<?php echo e($treatment_info->id); ?>" data-tp_info-tooth="<?php echo e($treatment_info->tooth_no); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-md-12 p-0 pt-3 pe-1">
                            <h5>There Are No Treatment Plans Added For This Patient Yet.</h5>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Treatment Card end -->

            </div>
        </div>
        <!-- Mid Section end -->

        <!-- Prescription,Ad & Events start -->
        <div class="col-md-3 page-home">
            <?php echo $__env->make('doctor.include.patientRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!-- Admin Notice,Ad & Events end -->

<!-- main end -->

<?php echo $__env->make('doctor.include.modals.view_patient_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<script src="<?php echo e(asset ('assets/js/app.js')); ?>"></script>

<script src="<?php echo e(asset ('assets/js/chosen.jquery.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // $(".multi").select2();
        $(".multi").select2({
            dropdownParent: $("#Treatment_tools")
            // dropdownParent: $("#Treatment_edit")
        });
        $(".multi2").select2({
            // dropdownParent: $("#Treatment_tools")
            dropdownParent: $("#Treatment_edit")
        });

        $(document).on("click", '#SPatientDetails', function() {
            $(this).attr('id', 'HPatientDetails');
            $(this).text('Hide Details');
            $(this).addClass('mt-2');
            $('#patientInfoList').removeClass('d-none');
        });
        $(document).on("click", '#HPatientDetails', function() {
            $(this).attr('id', 'SPatientDetails');
            $(this).text('Show Details');
            $(this).removeClass('mt-2');
            $('#patientInfoList').addClass('d-none');
        });

        <?php if(Session::has('invalidTreatAdd') && count($errors) > 0): ?>
        let tooth_num = {
            {
                Session::get('invalidTreatAdd')
            }
        };
        $('.multi_tooth_no').text(tooth_num);
        $('#Treatment_tools').modal('show');
        <?php endif; ?>

        $(document).on('click', '.tooth_click', function() {
            var id = $(this).attr("id");
            // console.log(id);
            var teeth_Type = $("input[name='tooth-selector']:checked").val();
            // console.log(teeth_Type);
            $("#Treatment_tools").modal('show');
            $("#tooth_no_modal").val(id);
            $("#tooth_no_count_modal").val('1');
            $(".multi_tooth_no").text(id);
            $("#tooth_type_modal").val(teeth_Type);
            if (id > 10 && id < 19) {
                $("#tooth_side_modal").val('Upper Right');
                // $("#tooth_type_modal").val('Permanent Teeth');
            } else if (id > 20 && id < 29) {
                $("#tooth_side_modal").val('Upper Left');
                // $("#tooth_type_modal").val('Permanent Teeth');
            } else if (id > 30 && id < 39) {
                $("#tooth_side_modal").val('Lower Left');
                // $("#tooth_type_modal").val('Permanent Teeth');
            } else if (id > 40 && id < 49) {
                $("#tooth_side_modal").val('Lower Right');
                // $("#tooth_type_modal").val('Permanent Teeth');
            } else if (id > 50 && id < 56) {
                $("#tooth_side_modal").val('Upper Right');
                // $("#tooth_type_modal").val('Deciduous Teeth');
            } else if (id > 60 && id < 66) {
                $("#tooth_side_modal").val('Upper Left');
                // $("#tooth_type_modal").val('Deciduous Teeth');
            } else if (id > 70 && id < 76) {
                $("#tooth_side_modal").val('Lower Left');
                // $("#tooth_type_modal").val('Deciduous Teeth');
            } else if (id > 80 && id < 86) {
                $("#tooth_side_modal").val('Lower Right');
                // $("#tooth_type_modal").val('Deciduous Teeth');
            } else {
                $("#tooth_side_modal").val('Full Mouth');
            }
        });

        $(document).on('click', '.mul', function() {
            var teeth_Type = $("input[name='tooth-selector']:checked").val();
            if (teeth_Type == "Permanent Teeth") {
                // console.log(teeth_Type);
                $('#radio2').attr("disabled", true);
            } else {
                $('#radio1').attr("disabled", true);
            }
            $('.confirm').show();
            $('.cancel_btn').show();
            $("#Treatment_tools").modal('hide');
            $('.select').show();
            $('.mul').hide();
            $('.full').hide();

        });

        $(document).on('click', '.confirm', function() {
            var arr = [];
            let toothCount = $("input[name='t']:checked").length;
            $.each($("input[name='t']:checked"), function() {
                arr.push($(this).val());
            });
            var tooths = arr.join(", ");
            // console.log(arr.join(", "));
            $("#Treatment_tools").modal('show');
            var teeth_Type = $("input[name='tooth-selector']:checked").val();
            $("#tooth_type_modal").val(teeth_Type);
            $("#tooth_no_modal").val(tooths);
            $("#tooth_no_count_modal").val(toothCount);
            $(".multi_tooth_no").text(tooths);
            // $('.confirm').hide();
            $.each($("input[name='t']:checked"), function() {
                $("input[name='t']").prop("checked", false);
            });
            // $('.cancel_btn').hide();
            // $('.select').hide();

        });

        $(document).on('click', '.cancel_btn', function() {
            $('.confirm').hide();
            $('.cancel_btn').hide();
            $('.select').hide();
            $('.mul').show();
            $('.full').show();
            $('#radio1').attr("disabled", false);
            $('#radio2').attr("disabled", false);

        });

        $(document).on('click', '.treat_edit', function(e) {
            let t_id = $(this).val();
            let url = "<?php echo e(route('treatment_info_edit',[':t_id'])); ?>";
            url = url.replace(':t_id', t_id);


            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $("#Treatment_edit").modal('show');
                    $('#treatment_id').val(t_id);
                    $('.u_multi_tooth_no').text(response.t_info.tooth_no);
                    $('#u_tooth_no_modal').val(response.t_info.tooth_no);
                    $('#u_tooth_side_modal').val(response.t_info.tooth_side);
                    $('#u_tooth_type_modal').val(response.t_info.tooth_type);
                    $('#upc_c').text(response.t_info.chife_complaints);
                    $('#upc_f').text(response.t_info.clinical_findings);
                    $('#up_investigation').text(response.t_info.investigation);
                    $('#upt_p').val(response.t_info.treatment_plans);
                }
            });
        });

        $(document).on('click', '.delete-tp_info', function() {
            var deleteTPInfoId = $(this).val();
            let deleteTooth = $(this).attr('data-tp_info-tooth');
            // alert(deleteTPInfoId);
            $("#del-tp-info").modal('show');
            $('#del-tp_info-id').val(deleteTPInfoId);
            $('#del-t_num-name').text(deleteTooth);
        });

        // script for C/C Chief Complaint

        $(document).on('submit', '#AddCCForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#AddCCForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#chife_Complaint_Add').load(location.href + " #chife_Complaint_Add>*", "");
                        $('.cc_list').load(location.href + " .cc_list>*", "");
                        $('.load_cc').load(location.href + " .load_cc>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#chife_Complaint_Add').modal('hide');
                        $('#chife_Complaint').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                },
            });
        });

        $(document).on('click', '.CC_editbtn', function() {
            var cc_id = $(this).val();
            let url = "<?php echo e(route('edit_chife_complaint',[':cc_id'])); ?>";
            url = url.replace(':cc_id', cc_id);

            $("#chife_Complaint").modal('hide');
            $("#chife_Complaint_Update").modal('show');

            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('#CCId').val(cc_id);
                    $('#c_c_name').val(response.cc.name);
                }
            });
        });

        $(document).on('submit', '#UpdateCCForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#UpdateCCForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#chife_Complaint_Update').load(location.href + " #chife_Complaint_Update>*", "");
                        $('.cc_list').load(location.href + " .cc_list>*", "");
                        $('.load_cc').load(location.href + " .load_cc>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#chife_Complaint_Update').modal('hide');
                        $('#chife_Complaint').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.CC_' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-cc', function() {
            var deleteCCId = $(this).val();
            let deleteName = $(this).attr('data-cc-name');
            $("#chife_Complaint").modal('hide');
            // alert(deleteCCId);
            $("#del-CC").modal('show');
            $('#del-cc-id').val(deleteCCId);
            $('#del-cc-name').text(deleteName);
        });

        $(document).on('submit', '#DeleteCCForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#DeleteCCForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-CC').load(location.href + " #del-CC>*", "");
                        $('.cc_list').load(location.href + " .cc_list>*", "");
                        $('.load_cc').load(location.href + " .load_cc>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-CC').modal('hide');
                        $('#chife_Complaint').modal('show');
                    }
                },
            });
        });

        // script for C/F Clinical Findings

        $(document).on('submit', '#AddCFForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#AddCFForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Clinical_Finding_Add').load(location.href + " #Clinical_Finding_Add>*", "");
                        $('.cf_list').load(location.href + " .cf_list>*", "");
                        $('.load_cf').load(location.href + " .load_cf>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Clinical_Finding_Add').modal('hide');
                        $('#Clinical_Findings').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                },
            });
        });

        $(document).on('click', '.CF_editbtn', function() {
            var cf_id = $(this).val();
            let url = "<?php echo e(route('edit_clinical_finding',[':cf_id'])); ?>";
            url = url.replace(':cf_id', cf_id);
            $("#Clinical_Findings").modal('hide');
            // alert(cf_id);
            $("#Clinical_Finding_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#CFId').val(cf_id);
                    $('#c_f_name').val(response.cf.name);
                }
            });
        });

        $(document).on('submit', '#UpdateCFForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#UpdateCFForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Clinical_Finding_Update').load(location.href + " #Clinical_Finding_Update>*", "");
                        $('.cf_list').load(location.href + " .cf_list>*", "");
                        $('.load_cf').load(location.href + " .load_cf>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Clinical_Finding_Update').modal('hide');
                        $('#Clinical_Findings').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.CF_' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-cf', function() {
            var deleteCFId = $(this).val();
            let deleteName = $(this).attr('data-cf-name');
            $("#Clinical_Findings").modal('hide');

            // alert(deleteCFId);
            $("#del-CF").modal('show');
            $('#del-cf-id').val(deleteCFId);
            $('#del-cf-name').text(deleteName);
        });

        $(document).on('submit', '#DeleteCFForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#DeleteCFForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-CF').load(location.href + " #del-CF>*", "");
                        $('.cf_list').load(location.href + " .cf_list>*", "");
                        $('.load_cf').load(location.href + " .load_cf>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-CF').modal('hide');
                        $('#Clinical_Findings').modal('show');
                    }
                },
            });
        });

        // script for Investigation

        $(document).on('submit', '#AddInvestForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#AddInvestForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Investigation_Add').load(location.href + " #Investigation_Add>*", "");
                        $('.invest_list').load(location.href + " .invest_list>*", "");
                        $('.load_invest').load(location.href + " .load_invest>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Investigation_Add').modal('hide');
                        $('#Investigation').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                },
            });
        });

        $(document).on('click', '.Investigation_editbtn', function() {
            var Investigation_id = $(this).val();
            let url = "<?php echo e(route('edit_investigation',[':Investigation_id'])); ?>";
            url = url.replace(':Investigation_id', Investigation_id);
            $("#Investigation").modal('hide');
            // alert(Investigation_id);
            $("#Investigation_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#InvestigationId').val(Investigation_id);
                    $('#Investigation_name').val(response.inves.name);
                }
            });
        });

        $(document).on('submit', '#UpdateInvestForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#UpdateInvestForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Investigation_Update').load(location.href + " #Investigation_Update>*", "");
                        $('.invest_list').load(location.href + " .invest_list>*", "");
                        $('.load_invest').load(location.href + " .load_invest>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Investigation_Update').modal('hide');
                        $('#Investigation').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.Invest_' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-Investigation', function() {
            var deleteInvestigationId = $(this).val();
            let deleteName = $(this).attr('data-invest-name');
            $("#Investigation").modal('hide');
            // alert(deleteInvestigationId);
            $("#del-Investigation").modal('show');
            $('#del-Investigation-id').val(deleteInvestigationId);
            $('#del-Invest-name').text(deleteName);
        });

        $(document).on('submit', '#DeleteInvestForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#DeleteInvestForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-Investigation').load(location.href + " #del-Investigation>*", "");
                        $('.invest_list').load(location.href + " .invest_list>*", "");
                        $('.load_invest').load(location.href + " .load_invest>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-Investigation').modal('hide');
                        $('#Investigation').modal('show');
                    }
                },
            });
        });

        // script for T/P Treatment Plans

        $(document).on('submit', '#AddTPForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#AddTPForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Treatment_Plan_Add').load(location.href + " #Treatment_Plan_Add>*", "");
                        $('.TP_list').load(location.href + " .TP_list>*", "");
                        $('.load_TP').load(location.href + " .load_TP>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Treatment_Plan_Add').modal('hide');
                        $('#Treatment_Plans').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                },
            });
        });

        $(document).on('click', '.TP_editbtn', function() {
            var tp_id = $(this).val();
            let url = "<?php echo e(route('edit_treatment_plan',[':tp_id'])); ?>";
            url = url.replace(':tp_id', tp_id);
            $("#Treatment_Plans").modal('hide');
            // alert(tp_id);
            $("#Treatment_Plan_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#TPId').val(tp_id);
                    $('#t_p_name').val(response.tp.name);
                    $('#t_p_cost').val(response.tpCost.price);
                }
            });
        });

        $(document).on('submit', '#UpdateTPForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#UpdateTPForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Treatment_Plan_Update').load(location.href + " #Treatment_Plan_Update>*", "");
                        $('.TP_list').load(location.href + " .TP_list>*", "");
                        $('.load_TP').load(location.href + " .load_TP>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Treatment_Plan_Update').modal('hide');
                        $('#Treatment_Plans').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.TP_' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-tp', function() {
            var deleteTPId = $(this).val();
            let deleteName = $(this).attr('data-tp-name');
            $("#Treatment_Plans").modal('hide');
            // alert(deleteTPId);
            $("#del-TP").modal('show');
            $('#del-TP-id').val(deleteTPId);
            $('#del-TP-name').text(deleteName);
        });

        $(document).on('submit', '#DeleteTPForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#DeleteTPForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-TP').load(location.href + " #del-Investigation>*", "");
                        $('.TP_list').load(location.href + " .TP_list>*", "");
                        $('.load_TP').load(location.href + " .load_TP>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-TP').modal('hide');
                        $('#Treatment_Plans').modal('show');
                    }
                },
            });
        });

        // script for Delete Prescription

        $(document).on('click', '.delete-Prescription', function() {
            var deletePrescriptionId = $(this).val();
            var deleteName = $(this).attr('data-prescription-name');
            // alert(deletePrescriptionId);
            $("#del-Prescription").modal('show');
            $('#del-Prescription-id').val(deletePrescriptionId);
            $('#del-Prescription-name').text(deleteName);
        });

        // script for T/P Treatment Costs

        $(document).on('click', '.TP_Cost_editbtn', function() {
            var tp_Cost_id = $(this).val();
            $("#Treatment_Cost").modal('hide');
            // alert(tp_Cost_id);
            $("#Treatment_Cost_Update").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_treatment_cost/" + tp_Cost_id,
                success: function(response) {
                    // console.log(response);
                    $('#TPCostId').val(tp_Cost_id);
                    $('#tp_cost_name').val(response.tp_cost.name);
                    $('#tp_cost').val(response.tp_cost.price);
                }
            });
        });

        $(document).on('click', '.delete-tp_Cost', function() {
            var deleteTPCostId = $(this).val();
            $("#Treatment_Cost").modal('hide');
            // alert(deleteTPCostId);
            $("#del-Cost-TP").modal('show');
            $('#del-TP-cost-id').val(deleteTPCostId);
        });

        <?php if(Session::has('invalidPatientUpdate') && count($errors) > 0): ?>
        $('#UpdatePatient').modal('show');
        <?php endif; ?>

    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/reflexdn/public_html/resources/views/doctor/view_patient.blade.php ENDPATH**/ ?>