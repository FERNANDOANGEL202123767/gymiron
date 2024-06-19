let count=0;

let elementMember;
let elementplan;
let elementoverview;
let elementroutine;

function collapseSidebar() {
	if(count==0){
		initializeMember();
		let element=document.getElementById("navbarcollapse");
		 element.className = element.className.replace("page-container sidebar-collapsed", "page-container");
		  if(memcount==0)
		  	elementMember.className=elementMember.className.replace("","has-sub");
		  else if(memcount==1){
		  	elementMember.className=elementMember.className.replace("","has-sub opened");
		  }

		  if(plancount==0)
		  	elementplan.className=elementplan.className.replace("","has-sub");
		  else if(plancount==1)
		  	elementplan.className=elementplan.className.replace("","has-sub opened");

		  if(overviewcount==0)
		  	elementoverview.className=elementoverview.className.replace("","has-sub");
		  else if(overviewcount==1)
		  	elementoverview.className=elementoverview.className.replace("","has-sub opened");

		  if(routinecount==0)
		  	elementroutine.className=elementroutine.className.replace("","has-sub");
		  else if(routinecount==1)
		  	elementroutine.className=elementroutine.className.replace("","has-sub opened");

		 count=1;
	}
	else if(count==1){
		let element=document.getElementById("navbarcollapse");
		 element.className = element.className.replace("page-container", "page-container sidebar-collapsed");
		  
		 
		 if(memcount==0){
		  	elementMember.className=elementMember.className.replace("has-sub","");
		  }else if(memcount==1){
		  	elementMember.className=elementMember.className.replace("has-sub opened","");
		  } 	

		  if(plancount==0)
		  	elementplan.className=elementplan.className.replace("has-sub","");
		  else
		  	elementplan.className=elementplan.className.replace("has-sub opened","");

		   if(overviewcount==0)
		  	elementoverview.className=elementoverview.className.replace("has-sub","");
		  else if(overviewcount==1)
		  	elementoverview.className=elementoverview.className.replace("has-sub opened","");

		  if(routinecount==0)
		  	elementroutine.className=elementroutine.className.replace("has-sub","");
		  else if(routinecount==1)
		  	elementroutine.className=elementroutine.className.replace("has-sub opened","");

		 count=0;
	}
 
}

function initializeMember(){
	elementMember=document.getElementById("hassubopen");
	elementplan=document.getElementById("planhassubopen");
	elementoverview=document.getElementById("overviewhassubopen");
	elementroutine=document.getElementById("routinehassubopen");

}

let memcount=0;
let plancount=0;
let overviewcount=0;
let routinecount=0;

function memberExpand(passvalue){

	if(passvalue==1){
		if(memcount==0){
		
		    if(plancount==1){
				elementplan.className=elementplan.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("planExpand");
				 element.className = element.className.replace("visible", "");
			 	plancount=0;
		    }
		    if(overviewcount==1){
				elementoverview.className=elementoverview.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("overviewExpand");
				 element.className = element.className.replace("visible", "");
			 	overviewcount=0;
		    }
		    if(routinecount==1){
		    	elementroutine.className=elementroutine.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("routineExpand");
				 element.className = element.className.replace("visible", "");
			 	  routinecount=0;

		    }

			elementMember.className=elementMember.className.replace("has-sub","has-sub opened");

			let element=document.getElementById("memExpand");
			 element.className = element.className.replace("", "visible");
			 memcount=1;
		}
		else if(memcount==1){
			elementMember.className=elementMember.className.replace("has-sub opened","has-sub");

			let element=document.getElementById("memExpand");
			 element.className = element.className.replace("visible", "");
			 memcount=0;
		}
	}
	else if(passvalue==2){
		if(plancount==0){

			if(memcount==1){
				elementMember.className=elementMember.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("memExpand");
				 element.className = element.className.replace("visible", "");
			 	 memcount=0;
		    }
		    if(overviewcount==1){
				elementoverview.className=elementoverview.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("overviewExpand");
				 element.className = element.className.replace("visible", "");
			 	overviewcount=0;
		    }
		    if(routinecount==1){
		    	elementroutine.className=elementroutine.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("routineExpand");
				 element.className = element.className.replace("visible", "");
			 	  routinecount=0;

		    }
		
			elementplan.className=elementplan.className.replace("has-sub","has-sub opened");

			let element2=document.getElementById("planExpand");
			 element2.className = element2.className.replace("", "visible");
			 plancount=1;
		}
		else if(plancount==1){
			elementplan.className=elementplan.className.replace("has-sub opened","has-sub");

			let element2=document.getElementById("planExpand");
			 element2.className = element2.className.replace("visible", "");
			 plancount=0;
		}
	}
	else if(passvalue==3){
		if(overviewcount==0){
		
			if(plancount==1){
				elementplan.className=elementplan.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("planExpand");
				 element.className = element.className.replace("visible", "");
			 	plancount=0;
		    }
		    if(memcount==1){
				elementMember.className=elementMember.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("memExpand");
				 element.className = element.className.replace("visible", "");
			 	memcount=0;
		    }
		    if(routinecount==1){
		    	elementroutine.className=elementroutine.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("routineExpand");
				 element.className = element.className.replace("visible", "");
			 	  routinecount=0;

		    }

			elementoverview.className=elementoverview.className.replace("has-sub","has-sub opened");

			let element3=document.getElementById("overviewExpand");
			 element3.className = element3.className.replace("", "visible");
			 overviewcount=1;
		}
		else if(overviewcount==1){
			elementoverview.className=elementoverview.className.replace("has-sub opened","has-sub");

			let element3=document.getElementById("overviewExpand");
			 element3.className = element3.className.replace("visible", "");
			 overviewcount=0;
		}
	}
	else if(passvalue==4){
		if(routinecount==0){
		
			if(plancount==1){
				elementplan.className=elementplan.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("planExpand");
				 element.className = element.className.replace("visible", "");
			 	plancount=0;
		    }
		    if(overviewcount==1){
				elementoverview.className=elementoverview.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("overviewExpand");
				 element.className = element.className.replace("visible", "");
			 	overviewcount=0;
		    }
		   if(memcount==1){
				elementMember.className=elementMember.className.replace("has-sub opened","has-sub");

				let element=document.getElementById("memExpand");
				 element.className = element.className.replace("visible", "");
			 	memcount=0;
		    }

			elementroutine.className=elementroutine.className.replace("has-sub","has-sub opened");

			let element4=document.getElementById("routineExpand");
			 element4.className = element4.className.replace("", "visible");
			 routinecount=1;
		}
		else if(routinecount==1){
			elementroutine.className=elementroutine.className.replace("has-sub opened","has-sub");

			let element4=document.getElementById("routineExpand");
			 element4.className = element4.className.replace("visible", "");
			 routinecount=0;
		}

	}
}
