class Autocomplete{
  constructor (input, options){
    this.input = input;
    this.options = options;
    this.currentFocus;
    this.bindEvents.bind(this);
    this.bindEvents();
  }

  bindEvents(){
    document.addEventListener("click", (ev)=>{
      this.closeAllLists(ev.taget);
    })


    this.input.addEventListener("input", (ev)=>{
      var a, b, i, val, el;
      val = this.input.value;

      this.closeAllLists();
      if(!val) return false;

      this.currentFocus = -1;

      a = document.createElement("DIV");
      a.setAttribute("id", this.input.id+"autocomplete-list");
      a.setAttribute("class", "autocomplete-items");

      this.input.parentNode.appendChild(a);

      for (var i = 0; i < this.options.length; i++) {
        if(this.options[i].substr(0, val.length).toUpperCase() == val.toUpperCase()){
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + this.options[i].substr(0, val.length) + "</strong>";
          b.innerHTML += this.options[i].substr(val.length);
          console.log(b.innerHTML);
          let inpt = document.createElement("input");
          inpt.type = "hidden";
          inpt.value = this.options[i];
          b.appendChild(inpt);
          b.addEventListener("click", (ev)=>{
            this.input.value = ev.target.getElementsByTagName("input")[0].value;

            this.closeAllLists();
            this.input.form.submit();
          });
          a.appendChild(b);
        }
      }
    });
    this.input.addEventListener("keydown", (ev)=>{
      var x = document.getElementById(this.input.id + "autocomplete-list");
      if(x) x = x.getElementsByTagName("div");
      if(ev.keyCode == 40){
        this.currentFocus++;
        this.addActive(x);
      }else if(ev.keyCode == 38){
        this.currentFocus--;
        this.addActive(x);
      }else if(ev.keyCode == 13){
        ev.preventDefault();
        if(this.currentFocus > -1){
          if(x) x[this.currentFocus].click();
        }
      }
    });
  }

  addActive(x){
    if(!x) return false;
    this.removeAcive(x);
    if(this.currentFocus >= x.length) this.currentFocus = 0;
    if(this.currentFocus < 0) this.currentFocus = (x.length-1);
    x[this.currentFocus].classList.add("autocomplete-active");
  }

  removeAcive(x){
    for(var i = 0; i < x.length; i++){
      x[i].classList.remove("autocomplete-active");
    }
  }

  closeAllLists(el){
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if(el != x[i] && el != this.input){
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
}
