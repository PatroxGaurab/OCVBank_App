function drop_down_obj(obj_nam,spd,coeff)
{
	this.nam_obj = "";
	this.nam_obj += obj_nam;
	this.xposition=1200;
	this.varIdentifier=0;
	this.timeCnt = 0;
	this.for_flag = true;
	this.speed_mes = spd;
	this.u = 2*Math.sqrt(120)*Math.sqrt(this.speed_mes);
	this.delay = 1;
	this.e = coeff;
	this.createAnimation=createAnimation;
}
function createAnimation(){
	obj1 = this;
	//alert(obj1); 
	if(document.all){ 
		document.all.animationDiv.style.left=this.xposition;
	} 
	if(!document.all && document.getElementById){ 
		document.getElementById(this.nam_obj).style.left=this.xposition+"px";
	} 
	if (this.xposition<=0 && this.for_flag){
		//alert("In if"); 
		this.for_flag = false;
		this.timeCnt = 0;
		this.u *= this.e;
		this.varIdentifier = window.setTimeout("obj1.createAnimation();",obj1.delay);
	} 
	else if(this.for_flag){ 
		//alert("in else if");
		this.timeCnt+=0.1;
		var x = .1*this.timeCnt*this.timeCnt*this.speed_mes;
		this.xposition = 1200-x;
		this.varIdentifier = window.setTimeout("obj1.createAnimation();",obj1.delay);
	}
	else{
		//alert("In else"); 
		this.timeCnt+=0.1;
		var x = this.timeCnt*this.u-0.1*this.timeCnt*this.timeCnt*this.speed_mes;

		this.xposition = 0+x;
		if(x <= 0){
			this.u *= this.e;
			if(this.u <= 0.000003)
				return;
			this.timeCnt = 0;
		}
		if(this.xposition <= 0 && this.timeCnt)
		{
			alert("In if");
			window.clearTimeout(this.varIdentifier); this.varIdentifier =0;
		}
		this.varIdentifier = window.setTimeout("obj1.createAnimation();",obj1.delay);
	} 
} 