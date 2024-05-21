@include('include.header')
 
    <!-- main start -->
    <div class="container-fluid">
        <div class="row">
            <!-- Profile start -->
            <div class="col-md-3 pe-0">
                <div class="profile">
                    <div class="complete">
                        <div class="p-header">
                            <!-- <img src="img/banner.jpg" class="cover"> -->
                            <img src="{{ asset('assets/img/profile.png')}}" class="doctor-profile my-4">

                            <h2 class="mb-2">Md. Abul Kasam</h2>
                        </div>
                        <div class="Patient-personal-info">
                            <div class="row">
                                <div class="col-12 text-start">Patient ID: 123456789</div>
                                <div class="col-8 text-start">Date of Birth: 12/12/2020</div>
                                <div class="col-4 text-start">Age: 25</div>
                                <div class="col-6 text-start pe-0">Gender: Female</div>
                                <div class="col-6 text-start ps-0">Blood Group: AB+</div>
                                <div class="col-12 text-start">Mobile: 01933333333</div>

                                <div class="col-12 text-start">Occupation: Student</div>
                                <div class="col-12 text-start">Address: 12/C,Uttara-12,Uttara,Dhaka</div>
                                <div class="col-12 text-start">Email:aasdfbadsf@gmail.com</div>
                                <div class="col-12 text-start">Reference: 32165</div>
                            </div>
                        </div>
                        <div class="Patient-info">
                            <div class="row">
                                <div class="col-12 text-start">BP : </div>
                                <div class="col-12 text-start">Heart Disease:</div>
                                <div class="col-12 text-start">Diabetic:</div>
                                <div class="col-12 text-start">Helpatics:</div>
                                <div class="col-12 text-start">Bleeding discorder:</div>
                                <div class="col-12 text-start">Allergy:</div>
                                <div class="col-12 text-start">Pregnant/Lactating:</div>
                                <div class="col-12 text-start">Other:</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile py-2">
                    <!-- <h3>Treatment Plans</h3> -->
                    <div class="complete">
                        <a href="#" class="btns my-2">Treatment Plans</a>
                        <a href="#" class="btns my-2">Appointment</a>
                        <a href="{{route('prescription_list')}}" class="btns my-2">Prescription</a>

                        <a href="#" class="btns my-2">Billing</a>
                    </div>

                    <!-- <a href="">setting</a>
              <a href="" class="lgout-a">Logout</a> -->
                </div>
            </div>
            <!-- Profile end -->
            <!-- Mid Section start -->
            <div class="col-md-6 pe-0">
                <div class="blank-sec">
                    <!-- teeth chart start -->
                    <div class="chart-teeth">
                        <div class="row mx-0">
                            <div class="col-md-6 p-0">
                                <div class="top-area1" id="top-area-top">
                                    <input type="radio" name="tooth-selector" id="radio1">
                                    <label for="radio1">Permanent Teeth</label>
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-6 p-0">
                                <div class="top-area2" id="sec-col-top">
                                    <input type="radio" name="tooth-selector" id="radio2">
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
                                                        <p>1</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/1TMR.png')}}"
                                                            alt="" id="1">
                                                        <p>18</p>
                                                    </li>
                                                    <li>
                                                        <p>2</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/2SMR.png')}}"
                                                            alt="" id="2">
                                                        <p>17</p>
                                                    </li>
                                                    <li>
                                                        <p>3</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/3FMR.png')}}"
                                                            alt="" id="3">
                                                        <p>16</p>
                                                    </li>
                                                    <li>
                                                        <p>4</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/4SPMR.png')}}"
                                                            alt="" id="4">
                                                        <p>15</p>
                                                    </li>
                                                    <li>
                                                        <p>5</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/5FPMR.png')}}"
                                                            alt="" id="5">
                                                        <p>14</p>
                                                    </li>
                                                    <li>
                                                        <p>6</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/6CR.png')}}"
                                                            alt="" id="6">
                                                        <p>13</p>
                                                    </li>
                                                    <li>
                                                        <p>7</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/7LIR.png')}}"
                                                            alt="" id="7">
                                                        <p>12</p>
                                                    </li>
                                                    <li>
                                                        <p>8</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/8CIR.png')}}"
                                                            alt="" id="8">
                                                        <p>11</p>
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
                                                        <p>9</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/9CIL.png')}}"
                                                            alt="" id="9">
                                                        <p>21</p>
                                                    </li>
                                                    <li>
                                                        <p>10</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/10LIL.png')}}"
                                                            alt="" id="10">
                                                        <p>22</p>
                                                    </li>
                                                    <li>
                                                        <p>11</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/11CL.png')}}"
                                                            alt="" id="11">
                                                        <p>23</p>
                                                    </li>
                                                    <li>
                                                        <p>12</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/12FPML.png')}}"
                                                            alt="" id="12">
                                                        <p>24</p>
                                                    </li>
                                                    <li>
                                                        <p>13</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/13SPML.png')}}"
                                                            alt="" id="13">
                                                        <p>25</p>
                                                    </li>
                                                    <li>
                                                        <p>14</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/14FML.png')}}"
                                                            alt="" id="14">
                                                        <p>26</p>
                                                    </li>
                                                    <li>
                                                        <p>15</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/15SML.png')}}"
                                                            alt="" id="15">
                                                        <p>27</p>
                                                    </li>
                                                    <li>
                                                        <p>16</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/16TML.png')}}"
                                                            alt="" id="16">
                                                        <p>28</p>
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
                                            <div class="upper-right-teeths">
                                                <ul>
                                                    <li>
                                                        <p>48</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/48TMR.png')}}"
                                                            alt="" id="32">
                                                        <p>32</p>
                                                    </li>
                                                    <li>
                                                        <p>47</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/47SMR.png')}}"
                                                            alt="" id="31">
                                                        <p>31</p>
                                                    </li>
                                                    <li>
                                                        <p>46</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/46FMR.png')}}"
                                                            alt="" id="30">
                                                        <p>30</p>
                                                    </li>
                                                    <li>
                                                        <p>45</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/45SPMR.png')}}"
                                                            alt="" id="29">
                                                        <p>29</p>
                                                    </li>
                                                    <li>
                                                        <p>44</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/44FPMR.png')}}"
                                                            alt="" id="28">
                                                        <p>28</p>
                                                    </li>
                                                    <li>
                                                        <p>43</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/43CR.png')}}"
                                                            alt="" id="27">
                                                        <p>27</p>
                                                    </li>
                                                    <li>
                                                        <p>42</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/42LIR.png')}}"
                                                            alt="" id="26">
                                                        <p>26</p>
                                                    </li>
                                                    <li>
                                                        <p>41</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/41CIR.png')}}"
                                                            alt="" id="25">
                                                        <p>25</p>
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
                                                        <p>31</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/31CIL.png')}}"
                                                            alt="" id="24">
                                                        <p>24</p>
                                                    </li>
                                                    <li>
                                                        <p>32</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/32LIL.png')}}"
                                                            alt="" id="23">
                                                        <p>23</p>
                                                    </li>
                                                    <li>
                                                        <p>33</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/33CL.png')}}"
                                                            alt="" id="22">
                                                        <p>22</p>
                                                    </li>
                                                    <li>
                                                        <p>34</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/34FPML.png')}}"
                                                            alt="" id="21">
                                                        <p>21</p>
                                                    </li>
                                                    <li>
                                                        <p>35</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/35SPML.png')}}"
                                                            alt="" id="20">
                                                        <p>20</p>
                                                    </li>
                                                    <li>
                                                        <p>36</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/36FML.png')}}"
                                                            alt="" id="19">
                                                        <p>19</p>
                                                    </li>
                                                    <li>
                                                        <p>37</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/37SML.png')}}"
                                                            alt="" id="18">
                                                        <p>18</p>
                                                    </li>
                                                    <li>
                                                        <p>38</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/38TML.png')}}"
                                                            alt="" id="17">
                                                        <p>17</p>
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
                                                        <p>A</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/4SPMR.png')}}"
                                                            alt="" id="A">
                                                        <p>15</p>
                                                    </li>
                                                    <li>
                                                        <p>B</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/5FPMR.png')}}"
                                                            alt="" id="B">
                                                        <p>14</p>
                                                    </li>
                                                    <li>
                                                        <p>C</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/6CR.png')}}"
                                                            alt="" id="C">
                                                        <p>13</p>
                                                    </li>
                                                    <li>
                                                        <p>D</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/7LIR.png')}}"
                                                            alt="" id="D">
                                                        <p>12</p>
                                                    </li>
                                                    <li>
                                                        <p>E</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-right/8CIR.png')}}"
                                                            alt="" id="E">
                                                        <p>11</p>
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
                                                        <p>F</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/9CIL.png')}}"
                                                            alt="" id="F">
                                                        <p>21</p>
                                                    </li>
                                                    <li>
                                                        <p>G</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/10LIL.png')}}"
                                                            alt="" id="G">
                                                        <p>22</p>
                                                    </li>
                                                    <li>
                                                        <p>H</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/11CL.png')}}"
                                                            alt="" id="H">
                                                        <p>23</p>
                                                    </li>
                                                    <li>
                                                        <p>I</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/12FPML.png')}}"
                                                            alt="" id="I">
                                                        <p>24</p>
                                                    </li>
                                                    <li>
                                                        <p>J</p>
                                                        <img src="{{ asset('assets/img/teeths/Upper-left/13SPML.png')}}"
                                                            alt="" id="J">
                                                        <p>25</p>
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
                                            <div class="upper-right-teeths">
                                                <ul>
                                                    <li>
                                                        <p>45</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/45SPMR.png')}}"
                                                            alt="" id="T">
                                                        <p>T</p>
                                                    </li>
                                                    <li>
                                                        <p>44</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/44FPMR.png')}}"
                                                            alt="" id="S">
                                                        <p>S</p>
                                                    </li>
                                                    <li>
                                                        <p>43</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/43CR.png')}}"
                                                            alt="" id="R">
                                                        <p>R</p>
                                                    </li>
                                                    <li>
                                                        <p>42</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/42LIR.png')}}"
                                                            alt="" id="Q">
                                                        <p>Q</p>
                                                    </li>
                                                    <li>
                                                        <p>41</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Right/41CIR.png')}}"
                                                            alt="" id="P">
                                                        <p>P</p>
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
                                                        <p>31</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/31CIL.png')}}"
                                                            alt="" id="O">
                                                        <p>O</p>
                                                    </li>
                                                    <li>
                                                        <p>32</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/32LIL.png')}}"
                                                            alt="" id="N">
                                                        <p>N</p>
                                                    </li>
                                                    <li>
                                                        <p>33</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/33CL.png')}}"
                                                            alt="" id="M">
                                                        <p>M</p>
                                                    </li>
                                                    <li>
                                                        <p>34</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/34FPML.png')}}"
                                                            alt="" id="L">
                                                        <p>L</p>
                                                    </li>
                                                    <li>
                                                        <p>35</p>
                                                        <img src="{{ asset('assets/img/teeths/Lower-Left/35SPML.png')}}"
                                                            alt="" id="K">
                                                        <p>K</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end -->
                                </div>
                                <!-- Tooth Tools Function Start -->
                                <div class="tool-out">
                                    <div class="tools-h">
                                        <h3 id="hi">Tooth No. 14</h3>
                                        <h3 id="hello">Upper Right</h3>
                                        <i class="fa-solid fa-xmark" id="close-btn"></i>
                                    </div>
                                    <h5>C/C Chief Complaint</h5>
                                    <label for="exampleDataList" class="form-label">Datalist example</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                        placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        <option value="San Francisco">
                                        <option value="New York">
                                        <option value="Seattle">
                                        <option value="Los Angeles">
                                        <option value="Chicago">
                                    </datalist>
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
                                    <h5>C/C Chief Complaint</h5>
                                    <input type="text">
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
                                    <h5>C/C Chief Complaint</h5>
                                    <input type="text">
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
                                </div>
                            </div>
                            <!-- Tooth Tools Function Start -->

                            <!-- Teeth Button -->
                            <div class="col-md-12 teeth-bottom px-0">
                                <div class="teeth-btn">
                                    <a>Full Mouth</a>
                                    <a>Multi Teeth</a>
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
                        <div class="treatment-cards-h p-2">
                            <h4 class="m-0">Treatment Plans For Md. Abul Kasam</h4>
                        </div>
                        <!-- Treatment Plans Status -->
                        <div class="row mx-0">
                            <div class="col-md-4 p-0 pt-1 pe-1">
                                <div class="treatment-card d-flex flex-column flex-wrap">
                                    <div class="treatment-card-details">
                                        <h4 class="m-0">Upper Right Central Incisor</h4>
                                        <p class="fw-bold m-0 ms-1 mt-1">Root Canal Treatment</p>
                                        <p class="m-0 ms-1">Start : 12/04/2021</p>
                                        <p class="m-0 ms-1">Status : <span class="text-warning">Progress</span></p>
                                        <p class="m-0 ms-1 mb-1">Next Visit : 25/04/2021</p>
                                    </div>
                                    <div class="treatment-card-btn">
                                        <h5 class="py-1">Enter</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p-0 pt-1 pe-1">
                                <div class="treatment-card d-flex flex-column flex-wrap">
                                    <div class="treatment-card-details">
                                        <h4 class="m-0">Full Mouth</h4>
                                        <p class="fw-bold m-0 ms-1 mt-1">Scaling & Polishing</p>
                                        <p class="m-0 ms-1">Start : 04/03/2021</p>
                                        <p class="m-0 ms-1">Status : <span class="text-success">Done</span></p>
                                    </div>
                                    <div class="treatment-card-btn">
                                        <h5 class="py-1">Enter</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p-0 pt-1">
                                <div class="treatment-card d-flex flex-column flex-wrap">
                                    <div class="treatment-card-details">
                                        <h4 class="m-0">Tooth No : 2-3-4</h4>
                                        <p class="fw-bold m-0 ms-1 mt-1">Bridge</p>
                                        <p class="m-0 ms-1">Status : <span class="text-danger">Not Done</span></p>
                                    </div>
                                    <div class="treatment-card-btn">
                                        <h5 class="py-1">Enter</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Treatment Card end -->
                    <!-- Pre -->
                    <div class="treatment-cards my-3">
                        <div class="treatment-cards-h p-2">
                            <h4 class="m-0">Previous Prescription</h4>
                        </div>
                        <!-- pre table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Prescription 2</th>
                                    <td>12/04/2021</td>
                                    <td class="action-btns">
                                        <a href="#">View</a>
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Send</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Prescription 1</th>
                                    <td>24/03/2021</td>
                                    <td class="action-btns">
                                        <a href="#">View</a>
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Send</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Mid Section end -->

            <!-- Prescription,Ad & Events start -->
            <div class="col-md-3 page-home">

                <!-- We have info-box-col-1 for not fixed height -->
                <div class="info-box-col p-2 mb-3">
                    <h4 class="d-flex justify-content-end">Previous Medical History</h4>
                </div>
                <div class="info-box-col p-2 mb-3">
                    <h4 class="d-flex justify-content-end">Ad</h4>
                </div>
                <div class="info-box-col p-2 mb-3">
                    <h4 class="d-flex justify-content-end">Upcoming Events</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Notice,Ad & Events end -->

    <!-- main end -->
     
   @include('include.footer')
