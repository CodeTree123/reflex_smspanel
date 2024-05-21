const one = document.querySelector("#permanent");
const three = document.querySelector("#deciduous");
const two = document.querySelector(".tool-out");
const tooth_no = document.getElementById("tooth_no");
const tooth_side = document.getElementById("tooth_side");

// let twoSide = window.getComputedStyle(two,'::before');
// let twoSide2 = window.getComputedStyle(two,'::after');


one.addEventListener("click",function(e){
        var trid = e.target.id;
        tooth_no.value = trid;
        two.style.display = "none";
        if (trid > 10 && trid < 19){
                tooth_side.value = "Upper Right";
                document.getElementById("tooth_type").value="Permanent Teeth";
        }
        else if (trid > 20 && trid < 29){
                tooth_side.value = "Upper Left";
                document.getElementById("tooth_type").value="Permanent Teeth";
        }
        else if (trid > 30 && trid < 39){
                tooth_side.value = "Lower Right";
                document.getElementById("tooth_type").value="Permanent Teeth";
        }
        else if (trid > 40 && trid < 49){
                tooth_side.value = "Lower Left";
                document.getElementById("tooth_type").value="Permanent Teeth";
        }

        if(trid == 18){
                // two.style.left = "-55px";
                // two.style.top = "175px";
                two.style.left = "-6%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 17){
                // two.style.left = "15px";
                // two.style.top = "175px";
                two.style.left = "-1%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 16){
                // two.style.left = "82px";
                // two.style.top = "175px";
                two.style.left = "4%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 15){
                // two.style.left = "142px";
                // two.style.top = "172px";
                two.style.left = "9%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 14){
                // two.style.left = "212px";
                // two.style.top = "172px";
                two.style.left = "14%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 13){
                // two.style.left = "276px";
                // two.style.top = "172px";
                two.style.left = "19%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 12){
                // two.style.left = "353px";
                // two.style.top = "172px"; 
                two.style.left = "25%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 11){
                // two.style.left = "422px";
                // two.style.top = "172px"; 
                two.style.left = "30%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 21){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "29%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 22){
                // two.style.right = "346px";
                // two.style.top = "170px"; 
                two.style.right = "24%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 23){
                // two.style.right = "216px";
                // two.style.top = "170px"; 
                two.style.right = "19%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 24){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "13%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 25){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "8%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 26){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "3%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 27){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "-2%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 28){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "-7%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 38){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "-7%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 37){
                // two.style.right = "346px";
                // two.style.top = "170px"; 
                two.style.right = "-2%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 36){
                // two.style.right = "216px";
                // two.style.top = "170px"; 
                two.style.right = "3%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 35){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "8%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 34){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "13%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 33){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "18%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 32){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "23%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(trid == 31){
                // two.style.right = "360px";
                // two.style.top = "170px"; 
                two.style.right = "29%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }


        else if(trid == 41){
                // two.style.left = "-55px";
                // two.style.top = "175px";
                two.style.left = "29%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 42){
                // two.style.left = "15px";
                // two.style.top = "175px";
                two.style.left = "24%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 43){
                // two.style.left = "82px";
                // two.style.top = "175px";
                two.style.left = "19%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 44){
                // two.style.left = "142px";
                // two.style.top = "172px";
                two.style.left = "14%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(trid == 45){
                // two.style.left = "212px";
                // two.style.top = "172px";
                two.style.left = "8%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 46){
                // two.style.left = "276px";
                // two.style.top = "172px";
                two.style.left = "4%";
                two.style.top = "45%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 47){
                // two.style.left = "353px";
                // two.style.top = "172px"; 
                two.style.left = "-1%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(trid == 48){
                // two.style.left = "422px";
                // two.style.top = "172px"; 
                two.style.left = "-6%";
                two.style.top = "45%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        
        else{
                two.style.display = "none";
                two.style.left = "0";
                two.style.right = "0";
        }





        // two.style.left = "-55px";
        // switch(trid<32){
        //         case 1:
        //                 two.style.left = "-55px";
        //          two.style.top = "170px";
        //                         break;
        //         default:
        //                 two.style.left = 0;
        // break;
        // }
});
three.addEventListener("click",function(e){
        // console.log(e);
        var dTrid = e.target.id;
        tooth_no.value = dTrid;
        two.style.display = "none";
        
        if(dTrid == "A"){
                // two.style.left = "37px";
                // two.style.top = "172px"; 
                two.style.left = "1%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(dTrid == "B"){
                // two.style.left = "106px";
                // two.style.top = "172px";
                two.style.left = "6%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(dTrid == "C"){
                // two.style.left = "171px";
                // two.style.top = "172px";
                two.style.left = "11%";
                two.style.top = "24%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(dTrid == "D"){
                // two.style.left = "248px";
                // two.style.top = "172px"; 
                two.style.left = "16%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(dTrid == "E"){
                // two.style.left = "317px";
                // two.style.top = "172px"; 
                two.style.left = "21%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(dTrid == "F"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "21%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "G"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "16%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "H"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "11%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "I"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "5%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "J"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "0%";
                two.style.top = "24%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "K"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "0%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "L"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "5%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "M"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "10%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "N"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "15%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "O"){
                // two.style.right = "417px";
                // two.style.top = "170px"; 
                two.style.right = "21%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','hidden');
                two.style.setProperty('--show2','visible');
        }
        else if(dTrid == "P"){
                // two.style.left = "37px";
                // two.style.top = "172px"; 
                two.style.left = "21%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(dTrid == "Q"){
                // two.style.left = "106px";
                // two.style.top = "172px";
                two.style.left = "16%";
                two.style.top = "44%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(dTrid == "R"){
                // two.style.left = "171px";
                // two.style.top = "172px";
                two.style.left = "11%";
                two.style.top = "44%";
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden'); 
        }
        else if(dTrid == "S"){
                // two.style.left = "248px";
                // two.style.top = "172px"; 
                two.style.left = "6%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        else if(dTrid == "T"){
                // two.style.left = "317px";
                // two.style.top = "172px"; 
                two.style.left = "1%";
                two.style.top = "44%"; 
                two.style.setProperty('--show','visible');
                two.style.setProperty('--show2','hidden');
        }
        
        else{
                two.style.display = "none";
                two.style.left = "0";
                two.style.right = "0";
        }
});


const closeBtn = document.querySelector("#close-btn");
closeBtn.addEventListener("click",function(){
        two.style.display = "none";
        two.style.left = "0";
        two.style.right = "0";
});


 // treatment_plan blade script
 const radio1 = document.getElementById("radio1");
 const radio2 = document.getElementById("radio2");
 const permanent = document.getElementById("permanent");
 const deciduous = document.getElementById("deciduous");
 permanent.style.display = 'flex';
 deciduous.style.display = "none";

 function handleRadioClick() {

     if (radio1.checked) {
         permanent.style.display = 'flex';
        //  document.getElementById("tooth_type").value="Permanent Teeth";
         deciduous.style.display = "none";

     } else {
         permanent.style.display = 'none';
         deciduous.style.display = "flex";
         document.getElementById("tooth_type").value="Deciduous Teeth";
     }
 }

 const radioButtons = document.querySelectorAll('input[name="tooth-selector"]');
 radioButtons.forEach(radio => {
     radio.addEventListener('click', handleRadioClick);
 });