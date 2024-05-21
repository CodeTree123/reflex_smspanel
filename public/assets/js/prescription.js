 
    $(document).ready(function () {

        $('.preloader').show();
        $.ajax({
            type : "POST",
            url: "{{route('mbbs.doctor.get.all.drug')}}",
            data : {
                '_token' : "{{csrf_token()}}",
            },
            success:function(data){
                console.log(data)
                $('.allGrugList').empty();
                $.each(data,function (index,value) {
                    $('.allGrugList').append(
                        `<option value="${value.drug_type} ${value.drug_name} ${value.drug_qt}">`
                    )
                })
                $('.preloader').hide();
            }
        });

    }) 

    var firebaseConfig = {
        apiKey: "{{env('API_KEY')}}",
        authDomain: "{{env('AUTH_DOMAIN')}}",
        projectId: "{{env('PROJECT_ID')}}",
        storageBucket: "{{env('STORAGE_BUCKET')}}",
        messagingSenderId: "{{env('MESSAGING_SENDER_ID')}}",
        appId: "{{env('APP_ID')}}",
        measurementId: "{{env('MEASUREMENT_ID')}}"
    };

    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const firestore = firebase.firestore();

    $(document).ready(function () {
        $('.preloader').show();
        let useremail = "{{Auth::user()->email}}";
        var doc_info = firestore.collection("doctors").doc(useremail);

        doc_info.get().then((doc)=>{
            $('.doc_uid').empty().val(doc.data()['U'])
            let doc_data = doc.data();
            let d_name_f = doc.data()['1'];
            let d_name_l = doc.data()['2'];
            let d_bmdc = doc_data.D;
            let d_phone = doc_data.e;
            let d_deg1 = doc_data.SPT;
            let d_deg2 = doc_data.a;
            let d_deg3 = doc_data.s;
            let drg = doc_data.DGR;

            let docname = `<h2 class="docname">Dr. ${d_name_f} ${d_name_l}</h2>`;
            $('.docname').replaceWith(docname);


            let rm_srt_nm = d_bmdc.substr(1);
            let bmdcnum = `<p class="bmdcnum">BMDC No: ${rm_srt_nm}</p>`;
            $('.bmdcnum').replaceWith(bmdcnum);

            let deg1 = `<h4 class="deg1">${d_deg1}</h4>`;
            $('.deg1').replaceWith(deg1);

            let deg2 = `<p class="deg2">${d_deg3}, ${d_deg2}</p>`;
            $('.deg2').replaceWith(deg2);


            if (drg){
                let DGR = `<p class="deg2">${drg}</p>`;
                $('.DGR').replaceWith(DGR);
            }


            let doc_uui = doc.data()['U']
            getDoctorProfileUrl(doc_uui);
            $('.preloader').hide();


        });

        $('.doc_chembars').empty();
        var doc_chembar = firestore.collection("doctors").doc(useremail).collection("C").get()
        .then(querySnapshot=>{
            $('.preloader').show();
            querySnapshot.forEach(doc => {

                console.log(doc.id);
                let c_name = doc.data()['n'];
                let c_id = doc.id;
                $('.doc_chembars').append(
                    `<option value="${c_id}">${c_name}</option>`
                );
            });
            $('.preloader').hide();
            showChembatDetials();
        });



        $('.doc_chembars').change(function () {
            showChembatDetials();
        })


        let showChembatDetials = () =>{
            $('.preloader').show();
            let chem_name = $('.doc_chembars').val();
            var doc_chembar = firestore.collection("doctors").doc(useremail).collection("C").doc(chem_name).get()
                .then(doc=>{
                    if (doc){
                        let chem_name = `<h2 class="chem_name">${doc.data()['n']}</h2>`;
                        $('.chem_name').replaceWith(chem_name);


                        let chem_phone = `<p class="chem_phone">Mobile: ${doc.data()['1']}</p>`;
                        $('.chem_phone').replaceWith(chem_phone);



                        if (doc.data()['m1F'] && doc.data()['m1T']){
                            let sat_mon = `<td class="sat_mon">${doc.data()['m1F']} - ${doc.data()['m1T']}</td>`;
                            $('.sat_mon').replaceWith(sat_mon);
                        }else {
                            let sat_mon = `<td class="sat_mon">CLOSED - CLOSED</td>`;
                            $('.sat_mon').replaceWith(sat_mon);
                        }


                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let sat_eve = `<td class="sat_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.sat_eve').replaceWith(sat_eve);
                        }else {
                            let sat_eve = `<td class="sat_eve">CLOSED - CLOSED</td>`;
                            $('.sat_eve').replaceWith(sat_eve);
                        }






                        if (doc.data()['m1F'] && doc.data()['m1T']){
                            let sun_mon = `<td class="sun_mon">${doc.data()['m2F']} - ${doc.data()['m2T']}</td>`;
                            $('.sun_mon').replaceWith(sun_mon);
                        }else {
                            let sun_mon = `<td class="sun_mon">CLOSED - CLOSED</td>`;
                            $('.sun_mon').replaceWith(sun_mon);
                        }

                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let sun_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.sun_eve').replaceWith(sun_eve);
                        }else {
                            let sun_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.sun_eve').replaceWith(sun_eve);
                        }



                        if (doc.data()['m3F'] && doc.data()['m3T']){
                            let mon_mor = `<td class="sun_mon">${doc.data()['m3F']} - ${doc.data()['m3T']}</td>`;
                            $('.mon_mor').replaceWith(mon_mor);
                        }else {
                            let mon_mor = `<td class="sun_mon">CLOSED - CLOSED</td>`;
                            $('.mon_mor').replaceWith(mon_mor);
                        }


                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let mon_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.mon_eve').replaceWith(mon_eve);
                        }else {
                            let mon_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.mon_eve').replaceWith(mon_eve);
                        }


                        if (doc.data()['m4F'] && doc.data()['m4T']){
                            let tue_mor = `<td class="sun_mon">${doc.data()['m4F']} - ${doc.data()['m4T']}</td>`;
                            $('.tue_mor').replaceWith(tue_mor);
                        }else {
                            let tue_mor = `<td class="sun_mon">CLOSED - CLOSED</td>`;
                            $('.tue_mor').replaceWith(tue_mor);
                        }

                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let tue_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.tue_eve').replaceWith(tue_eve);
                        }else {
                            let tue_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.tue_eve').replaceWith(tue_eve);
                        }


                        if (doc.data()['m5F'] && doc.data()['m5T']){
                            let wed_mor = `<td class="sun_mon">${doc.data()['m5F']} - ${doc.data()['m5T']}</td>`;
                            $('.wed_mor').replaceWith(wed_mor);
                        }else {
                            let wed_mor = `<td class="sun_mon">CLOSED - CLOSED</td>`;
                            $('.wed_mor').replaceWith(wed_mor);
                        }

                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let wed_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.wed_eve').replaceWith(wed_eve);
                        }else {
                            let wed_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.wed_eve').replaceWith(wed_eve);
                        }


                        if (doc.data()['m6F'] && doc.data()['m6T']){
                            let thu_mor = `<td class="sun_mon">${doc.data()['m6F']} - ${doc.data()['m6T']}</td>`;
                            $('.thu_mor').replaceWith(thu_mor);
                        }else {
                            let thu_mor = `<td class="sun_mon">CLOSED - CLOSED</td>`;
                            $('.thu_mor').replaceWith(thu_mor);
                        }

                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let thu_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.thu_eve').replaceWith(thu_eve);
                        }else {
                            let thu_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.thu_eve').replaceWith(thu_eve);
                        }




                        if (doc.data()['m7F'] && doc.data()['m7T']){
                            let fri_mor = `<td class="sun_mon">${doc.data()['m7F']} - ${doc.data()['m7T']}</td>`;
                            $('.fri_mor').replaceWith(fri_mor);
                        }else {
                            let fri_mor = `<td class=" sun_mon">CLOSED - CLOSED</td>`;
                            $('.fri_mor').replaceWith(fri_mor);
                        }


                        if (doc.data()['e1F'] && doc.data()['e1T']){
                            let fri_eve = `<td class="sun_eve">${doc.data()['e1F']} - ${doc.data()['e1T']}</td>`;
                            $('.fri_eve').replaceWith(fri_eve);
                        }else {
                            let fri_eve = `<td class="sun_eve">CLOSED - CLOSED</td>`;
                            $('.fri_eve').replaceWith(fri_eve);
                        }

                        $('.preloader').hide();
                        console.log(doc.data())
                    }

                }).catch(e=>{

                })
        }


        function getDoctorProfileUrl(doc_uui) {
            $('.preloader').show();
            let uu_id = doc_uui;
            let params = {
                longDynamicLink: `https://doctorprofile.page.link/?link=https://hospitalin.org/doctors/${uu_id}&apn=org.hospitalin&ibi=org.hospitalin.pre`,
            }

            let json_strin = JSON.stringify(params);
            var doc_u_id = '';
            $.ajax({
                url: 'https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=AIzaSyDrETDCrAO_IVYFE98WH8-UrjlPFhX55xk',
                type: 'POST',
                data: json_strin ,
                contentType: "application/json",
                success: function (response) {
                    let doc_url_id = response.shortLink;
                    getQrCode(doc_url_id);
                    $('.preloader').hide();
                },
                error: function (e) {
                    console.log('error '+ e)
                }
            });
        }


        function getQrCode(doc_url_id) {
            $('.preloader').show();
            $.ajax({
                type : "POST",
                url: "{{route('mbbs.doctor.qrcode')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'doc_url_id':doc_url_id
                },
                success:function(data){
                    $('.qrcode').empty().html(data);
                    $('.preloader').hide();
                }
            });
        };


        $('#pt_get_info').click(function () {
            $('.preloader').show();
            let number= $('.pt_mobile_no').val();
            var doc_info = firestore.collection("commonProfile").where("e", "==", number);
            // var query = doc_info.where("e", "==", doc_info);


            doc_info.get().then((querySnapshot)=>{

                querySnapshot.forEach((doc) => {
                    console.log(doc.data());
                    if (doc.data()[1]){
                        var options = {
                            year: 'numeric', month: 'numeric', day: 'numeric',
                        };

                        let today_date = new Date();
                        let today_date_years = today_date.getFullYear();
                        let mini_sec = parseInt(doc.data()['A']);
                        let min_sec_data = new Date(mini_sec);
                        let min_sec_datayear = min_sec_data.getFullYear();
                        let age = today_date_years - min_sec_datayear;
                        let min_sec_local = min_sec_data.toISOString().split('T')[0];
                        let ptnames = doc.data()['1']+' '+doc.data()['2'];
                        $('.pt_name').empty().val(ptnames);
                        $('.pt_dob').val(min_sec_local);
                        $('.pt_age').val(age);
                        $('.preloader').hide();
                    }else {
                        $('.preloader').hide();
                        alert('pai nai');
                    }




                });
            }).catch((error) => {
                $('.preloader').hide();
                alert('Patient Not Found');
                console.log("Error getting documents: ", error);

            });


        });


        $('#add_pt_to_pres').click(function () {
            $('.preloader').show();
            let pt_name = $('.pt_name').val();
            let pres_name = `<span class="value pres_pt_name">${pt_name}</span>`
            $('.pres_pt_name').replaceWith(pres_name);

            let pt_age = $('.pt_age').val();
            let pres_pt_age = `<span class="value pres_pt_age">${pt_age}</span>`;
            $('.pres_pt_age').replaceWith(pres_pt_age);


            let pt_dob = $('.pt_dob').val();
            let pres_pt_date = `<span class="value pres_pt_date">${pt_dob}</span>`;
            $('.pres_pt_date').replaceWith(pres_pt_date);


            let pt_address = $('.pt_address').val();
            let pres_pt_address = `<span class="value pres_pt_address">${pt_address}</span>`;
            $('.pres_pt_address').replaceWith(pres_pt_address);


            let pt_mobile_no = $('.pt_mobile_no').val();
            let pres_pt_mobile = `<span class="value pres_pt_mobile">${pt_mobile_no}</span>`;
            $('.pres_pt_mobile').replaceWith(pres_pt_mobile);


            $('#info').modal('hide');
            $('.preloader').hide();
        })


    }) 




