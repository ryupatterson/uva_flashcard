const term = document.querySelector(".flip-card-front");
const def = document.querySelector(".flip-card-back");
const nextButton = document.getElementById("next");
const prevButton = document.getElementById("prev");
var index = 0;

nextButton.addEventListener('click',function(){
  index++;
  getTerm();
  next();
});

prevButton.addEventListener('click',function(){
  index--;
  getTerm();
  prev();
});

function getTerm(){
  console.log("index=",index);
  if(index == 0){
    console.log('get_term');
    prevButton.disabled = true;
  }
  curr_term = entries[index]["entry_def"];
  curr_def = entries[index]['entry_answer'];
  term.innerHTML = `<b>${curr_term}</b>`;
  def.innerHTML = `<span><h4>${curr_def}</h4></span>`;
}

function next(){
  if( index == (entries.length-1) ){
    nextButton.disabled = true;
  }
  prevButton.disabled = false;
  console.log('enabled');
}

function prev(){
  if(index == 0){
    prevButton.disabled = true;
    console.log("disabled");
  }
  nextButton.disabled = false;
}
