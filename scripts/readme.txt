Please do the following:

1) In community.html delete go button's attribute href="/questions.html"
   and create onclick="sendData()" attribute


2) In plan.html put id="city" in <span> that has class="city-region loader" 
   and displays city and state name 
   

3) In plan.html change  <body onload="online();"> to
	<body onload="online(); init();">
