   //   now Lets make our calendar dynamic using some javascript

   let dayList = document.querySelector('.days');
   let monthName = document.querySelector('.month-name');
   let yearName = document.querySelector('.year');
   let prev = document.querySelector('.prev'); 
   let next = document.querySelector('.next');

   // lets create an Date object

   let dt = new Date();
   let month = dt.getMonth()+1 //as it will return value between 0-11 so to make it 1-12 we add 1 to it
   let year = dt.getFullYear();
   let currentDay = dt.getDate();
   

   //const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];



//    let day = weekday[dt.getDay()];
    // const days = getDays(year, month)
    // console.log(days-7)
//    for(let i = 0; i < )



   // make an array of month name to map with the month value we obtained using getMonth()
   let monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'july', 'August', 'September', 'October', 'November', 'December']

   // now lets handle the previous and next button click
   prev.addEventListener('click',event=>{
       if(month===1){
           month =12;
           month-=1;
       }else{
           month-=1;
       }
       calendar();
       testing();
      
   })

   next.addEventListener('click',event=>{
       if(month===12){
           month =1;
           month+=1;
       }else{
           month+=1;
       }
       calendar();
       testing();
   })
   // now lets make a calendar function

   const calendar = ()=>{
       monthName.innerHTML = monthNames[month-1];
       yearName.innerHTML = year;
       dayList.innerHTML = ''
       
       daysInMonth = new Date(year, month, 0).getDate(); //get toatl number of days in a particular month


       // but still there is a problem
       // you can see that for every month the date starts from monday
       // it should not be as that
       // date of a new month should start from the next immediate dat from when the previous month ends
       // so lets match that pattern by adding gaps before the starting of the day in month

       // get day number at which the current month start (0 for sunday, 6 for saturday)

       dayNumber = new Date(year,month-1,1).getDay();
       let gaps
       if (dayNumber === 0) {
           gaps = 6
       }else{
           gaps = dayNumber - 1;
           // Ex:: if it is monday dayNumber = 1, so gaps = 1-1 = 0;
           // if it is thursdat dayNumber = 4, so gaps = 4-1 = 3;
       }

       sevendaysGap = 6;
       
       for(day = -gaps + 1 ;day<=daysInMonth; day++){
           const days = document.createElement('li');
           days.setAttribute("class", "democlass");
    
           if(day<=0){
               days.innerHTML = "";
               dayList.appendChild(days);
           }
           else{
               days.innerHTML = day;
               dayList.appendChild(days);
           }
       }
       testing();
   }
 
    const testing = ()=>{
    let numOfDays = document.getElementsByClassName("democlass");
    sevendaysGap = 5;
        for(var i = 0; i < numOfDays.length; i++){
            if(i == sevendaysGap){
                sevendaysGap+=7;
                numOfDays[i].style.color = "red"
                numOfDays[i+1].style.color = "red"
             
            }
            if(i == sevendaysGap){
                sevendaysGap+=7;
                
            }
            
        }
    }