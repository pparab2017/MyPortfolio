
var svg ;
var maxEvents = 0;
var xstart;
var timeLineToolTip = "timeLineToolTip";
function bboxText( text ) {

   // console.log(text);
    svg.append("text")
        .attr("x", 0)
        .attr("y", 0)
        .attr("font-family","Helvetica Neue")
        .attr("font-size","13")
        .attr("font-weight","bold")
        .text(text);
    var text_element = svg.select("text");
    var textWidth = text_element.node().getComputedTextLength();
    svg.select("text").remove();
    return textWidth;
}



function mobileTimeLine(data)
{
    console.log("testing Data");
 console.log(data);
    for(var i=0;i< data.length;i++) {
        var eachTimeData  = data[i];
        var eachTimeEvent = data[i].events;
        var eachTimeDiv = Div.make("MobileTime");
        var arrow = Div.make("arrowM");
        var from = moment(new Date(eachTimeData.from)).format("MMM Do YYYY");
        if(eachTimeData.to != null)
        var to = moment(new Date(eachTimeData.to)).format("MMM Do YYYY");
        else
            to = "Present"
        arrow.append(from + " - " + to);
        eachTimeDiv.append(arrow);
        console.log(eachTimeEvent);

        var eachEventDiv = Div.make("MobileEvent");
        for(var j=0;j< eachTimeEvent.length; j++)
        {
            var img;
            var eachEvent = eachTimeEvent[j];
            if(eachEvent.type == "SCHOOL")
                img = Img.make("","/imgs/cutgrad.png","60px");
            else
                img = Img.make("","/imgs/cutwork.png","60px");

            img.setAttribute("style" ,"margin-top:-38px")


            var eachEventMobileEvent = Div.make("eachEventMobile");

            console.log(eachEvent);
            eachEventMobileEvent.innerHTML = "<b>" +eachEvent.title + "</b><br>" +eachEvent.company;

            if(j!= eachTimeEvent.length -1) {
                eachEventDiv.append(img);
                eachEventMobileEvent.setAttribute("style", "border-bottom: 1px dashed #ccc")
            }

            if(eachTimeEvent.length == 1 )
            {
                eachEventDiv.append(img);
            }

            eachEventDiv.append(eachEventMobileEvent);
            //eachEventDiv.append(eachEvent.company);
            eachTimeDiv.append(eachEventDiv);


        }
        $("#timeline_Mobile").append(eachTimeDiv);

    }

}

function generate(object)
{
    svg = d3.select("#timeline").append("svg");

    var width = 0;

  //  console.log("in genrate");
    var timeLine = [];
    maxEvents = 0;
    for(var i=0;i<object.length;i++){
        var events = object[i].Events;

        var EachObj = new Object();
        EachObj.from = object[i].FromDate;
        EachObj.to = object[i].ToDate;
        EachObj.dLenght = 0;
        EachObj.events = [];
        maxEvents =  ( events.length > maxEvents) ? events.length : maxEvents;
        for(var j=0;j<events.length;j++) {
            var toAdd = new Object();
            toAdd.title = events[j].Title;
            toAdd.company = events[j].Company;
            toAdd.des = events[j].Dsc;
            toAdd.type = events[j].EventType.Typename;
            EachObj.type = EachObj.type == "SCHOOL" ? "SCHOOL" : ( toAdd.type == "SCHOOL" ? toAdd.type : "WORK");
            toAdd.myLength = ( bboxText(toAdd.title)  >  bboxText(toAdd.company) ? bboxText(toAdd.title) : bboxText(toAdd.company));
            EachObj.dLenght =  EachObj.dLenght +  ( bboxText(toAdd.title)  >  bboxText(toAdd.company) ? bboxText(toAdd.title) : bboxText(toAdd.company)) ;
            EachObj.events.push(toAdd);
            width = width < EachObj.dLenght ? EachObj.dLenght : width;
        }

        timeLine.push(EachObj);


    }
    mobileTimeLine(timeLine);

    xstart= 20 * maxEvents;
    svg.attr("width", width + (30 * maxEvents));
    svg.attr("class","limg");
    svg.attr("height",100*6 );
    svg.append("g");

    timeLine[0].cLength = width;
    Ctree(svg,timeLine,0)
}
var yStart = 30;
var y = yStart;

var mulFact = 1.05;var nodeHeight = 60;


function ClearForm() {
    $("#ModalTitle").text("");
    $("#eventName").text("");
    $("#nodeName").text("");
    $("#modalDesc").text("");
}
function Ctree(svg, tree, off)
{
    //console.log(tree);
    clength = tree[0].cLength;
   // var x1 = (off ) + (tree[i].dLenght/2 * mulFact);
    var y1 = y;


    for(var i=0;i< tree.length;i++)
    {

var events = tree[i].events;

        var fromDate = moment(new Date(tree[i].from)).format("MM/DD/YYYY");
        if(tree[i].to != null)
        var toDate = moment(new Date(tree[i].to)).format("MM/DD/YYYY");
        else
         var toDate ="Till date";




var n = clength/events.length;

        //var x = 0, x1= 0;

        var x = (n / 2 ) - (tree[i].events[0].myLength / 2 ) + xstart  ;
        var x1 = (n / 2 ) - (tree[i].events[0].myLength / 2 ) + xstart;

        for(var j = 0;j<events.length;j++) {

            var g = svg.append("g");

            svg.append("line" )
                .attr("x1", 0)
                .attr("y1", y +  60)
                .attr("x2", clength + (30 * maxEvents) )
                .attr("y2", y + 60)
                .style("stroke-dasharray", ("3, 3"))
                .attr("stroke-width", 1)
                .attr("stroke", "#ccc");


           var cir =  svg.append("circle" )
                .attr("cx", 10)
                .attr("cy", y +  60)
                .attr("r", 3 )
                .attr("stroke-width", 2)
               .attr("class","pointer")
                .attr("fill", "#fff")
                .attr("stroke", "#8BC34A");

            cir.on("mouseout" ,function () {
                this.setAttribute("r", 3);
                d3.select('#tooltip')
                    .transition().duration(250)
                    .style('opacity', 0)
                d3.select('#showTime')
                    .transition().duration(250)
                    .style('opacity', 0)
            });

            cir.on("mouseover", function () {
                var dimCircle = this.getBoundingClientRect();
                var fromDate = moment(new Date(this.__thisNode__.from)).format("MM/DD/YYYY");
                if(this.__thisNode__.to == null)
                    var toDate = moment().format("MM/DD/YYYY");
                else
                    var toDate = moment(new Date(this.__thisNode__.to)).format("MM/DD/YYYY");
                var diff = moment.preciseDiff( fromDate,toDate);
                console.log(diff);

               // console.log(this);
                this.setAttribute("r", 5);
                d3.select('#tooltip').text(fromDate);
                console.log(this.__thisNode__);
                var img = this.__thisNode__.type == "WORK" ? "<img src='imgs/tie.png'/>" : " <img src='imgs/cap.png'/>";
                d3.select('#showTime').html(diff + img);
                var dimTip = document.getElementById('tooltip').getBoundingClientRect();
                var timeTip = document.getElementById('showTime').getBoundingClientRect();

                //console.log(dimTip.width);
                d3.select('#tooltip')
                    .style('left', (window.scrollX + dimCircle.left - dimTip.width - 10
                        ) + 'px' )
                    .style('top', (window.scrollY + dimCircle.top + dimCircle.height/2) - 10 + 'px')
                    .transition().duration(250)
                    .style('opacity', 1);



                d3.select('#showTime')
                    .style('left', (window.scrollX + dimCircle.left - timeTip.width - 10
                        ) + 'px' )
                    .style('top', (window.scrollY + dimCircle.top + dimCircle.height/2) - 60 + 'px')
                    .transition().duration(250)
                    .style('opacity', 1);

                var cx  = this.getAttribute("cx");
                var cy  = this.getAttribute("cy");
                console.log(cx+"   " +cy);




            });

            var href = svg.append("a")
                .attr("data-toggle","popover")
                .attr("data-container","body")
                .attr("title","Popover Header")
                .attr("data-content","Some content inside the popover")
                .attr("data-placement","right")
                .attr("data-trigger","hover");

            $("text").popover({trigger:'hover', placement:'bottom', title:'Title!', content:'Content'});


            var rect = g.append("rect")
                .attr("x", x)
                .attr("y", y - 20)
                .attr("width", tree[i].events[j].myLength  )
                .attr("height", nodeHeight)
                .attr("stroke-width", 1)
                .attr("class","pointer")
                .attr("stroke", function () {
                    return  events[j].type == "WORK" ? "#FFC107" : "#00B0FF";
                } )
                .attr("class", "pointer")
                .attr("rx", 3)
                .style("fill", "#fff");



            g.on("click", function () {
                console.log(this.__thisNode__);
                ClearForm();
                $('#myModal').modal('show');

                $("#ModalTitle").text(this.__thisNode__.title);
                if(this.__thisNode__.type == "WORK")
                $("#eventName").text( "Work place: ");
                else
                $("#eventName").text("University: ");

                $("#nodeName").append(this.__thisNode__.company);
                $("#modalDesc").append(this.__thisNode__.des);


            });

            g.node().__thisNode__ = events[j];
            cir.node().__thisNode__ = tree[i];

            var text = g.append("text")
                .attr("x",x1 + 7 )
                .attr("y", y)
                .attr("stroke-width", 0.5)
                .attr("fill", "#000")
                .attr("font-family", "Helvetica Neue")
                .attr("class", "svgtxt")
                .attr("font-size", "12")
                .attr("font-weight","bold")
                //.attr("text-anchor", "middle")
                .text(tree[i].events[j].title);


            var text = g.append("text")
                .attr("x",x1 + 7 )
                .attr("y", y + 20)
                .attr("stroke-width", 0.5)
                .attr("fill", "#000")
                .attr("font-family", "Helvetica Neue")
                .attr("class", "svgtxt")
                .attr("font-size", "12")
                //.attr("text-anchor", "middle")
                .text(tree[i].events[j].company);


            x = x + (tree[i].events[j].myLength) + 20 ;
            x1 = x1 +  tree[i].events[j].myLength + 20;
        }
        y = y + 100;

    }

}


var ToolTip = {};
ToolTip.make = function (unique_id) {
    var div = document.createElement("div");
    div.setAttribute("id", unique_id);
    div.setAttribute("class", "ToolTip");//style
    return div;
};

var Div = {};
Div.make = function (_class) {
    var _div = document.createElement("div");
    if(_class!="")
    _div.setAttribute("class", _class);//style
    return _div;
}

var Href = {};
Href.make = function (_class,link) {
    var _href = document.createElement("a");
    if(_class!="")
    _href.setAttribute("class", _class);//style
    _href.setAttribute("href",link);
    return _href;
}


var Span = {};
Span.make = function (_class) {
    var _span = document.createElement("span");
    _span.setAttribute("class", _class);//style

    return _span;
}

var Img = {};
Img.make = function (_class,link,height) {
    var _img = document.createElement("img");
    _img.setAttribute("class", _class);//style
    _img.setAttribute("src",link);
    if(height!="")
    _img.setAttribute("height",height);
    return _img;
}

var ImgH = {};
ImgH.make = function (_class,link,width) {
    var _img = document.createElement("img");
    _img.setAttribute("class", _class);//style
    _img.setAttribute("src",link);
    if(width!="")
        _img.setAttribute("width",width);
    return _img;
}


var Ol = {};
Ol.make = function () {
    var _ul = document.createElement("ul");
    _ul.setAttribute("class", "list-unstyled");
    return _ul;
}


var Ul = {};
Ul.make = function () {
    var _ul = document.createElement("ol");
    return _ul;
}


var Li = {};
Li.make = function (text,link) {
    var _li = document.createElement("li");
    var _a = document.createElement("a");
    _a.setAttribute("href",link);
    _a.append(text);
    _li.append(_a);
    return _li;
}

var Lic = {};
Lic.make = function (text,link) {
    var _li = document.createElement("li");
    var _a = document.createElement("a");
    _a.setAttribute("href",link);
    _a.append(text);
    _a.setAttribute("class","rev");
    _li.append(_a);
    return _li;
}






