/* -------------------------------------------------

Definition

------------------------------------------------- */
var animFrameInterval;
var animBrickInterval;
var animFallInterval;

var theme_path = "wp-content/themes/theme01/";

/* -------------------------------------------------

func_adjustHeight--要素高さ調整

------------------------------------------------- */
function func_adjustHeight(element,ratio) {
	wsize = $(element).width();
    $(element).css("height", wsize*ratio + "px");
}

/* -------------------------------------------------

func_adjustFixedElement--固定要素位置調整

------------------------------------------------- */
function func_adjustFixedElement(fixedElement,mainElement) {

	var fix = $(fixedElement), 				//固定したいコンテンツ
	main = $(mainElement), 					//固定する要素を収める範囲
	fixTop = fix.offset().top,
	mainTop = main.offset().top,
	h_fixHeight = $("header").css("position") === "fixed" ? $("header").height() : 0,
	w = $(window);

	// alert(h_fixHeight);
	$(window).scroll(function(){
		// alert("test");
		var fixHeight = fix.outerHeight(true),
		mainHeight = main.outerHeight(),
		winTop = w.scrollTop();
		if(winTop + fixHeight > mainTop + mainHeight - h_fixHeight){
			fix.css({
				position: "absolute",
				top: mainHeight - fixHeight + h_fixHeight
			});
			// alert("hit");
		}else if(winTop >= fixTop - h_fixHeight){
			fix.css({
				 position: "fixed",
				 top: h_fixHeight
		 });
		 // alert("fixed");
		}else{
			fix.css({
				 position: "absolute",
				 top: fixTop
			 });
				// alert("absolute");
		}
	});
}

/* -------------------------------------------------

func_inViewExec--スクロールで表示された場合に実行

------------------------------------------------- */
function func_inViewExec(elements,funcExec,funcStop,offsetY) {
	//実行フラグ
	var isExecFlag = false;
	// 引き金となる要素を設定
	var triggerNode = $(elements);
	// 画面スクロール毎に判定を行う
	$(window).scroll(function(){
		// 引き金となる要素の位置を取得
		var triggerNodePositionTop = $(triggerNode).offset().top - offsetY;
		var triggerNodePositionBottom = $(triggerNode).offset().top + $(triggerNode).height() + offsetY;

		//処理実行中である場合
		if(isExecFlag == true){
			// 現在のスクロール位置(Bottom)が引き金要素のBottom位置より上に超えた場合 且つ 現在のスクロール位置(Top)が引き金要素のBottom位置より下に超えた場合
			if (!($(window).scrollTop() + $(window).height() > triggerNodePositionTop && $(window).scrollTop() < triggerNodePositionBottom)){
				// alert("Cancel");
				funcStop();
				isExecFlag = false;	//実行しない。
			}
		}
		//未処理の場合
		else{
			//現在のスクロール位置(Bottom)が引き金要素のTop位置より下に超えた場合 且つ 現在のスクロール位置(Top)が引き金要素のBottom位置より上に超えた場合
			if ($(window).scrollTop() + $(window).height() > triggerNodePositionTop && $(window).scrollTop() < triggerNodePositionBottom){
				// 実行
				// alert("EXCEC");
				funcExec();
				isExecFlag = true;	//実行中
			}
		}
	});
}

/* -------------------------------------------------

func_animationSwing--アニメーション(揺らす)

------------------------------------------------- */
function func_animationSwing(elements) {
	var swgTarget;
	var anmSwing_00 = function (){
		var randTarget = elements[Math.floor(Math.random() * elements.length)];
		swgTarget = randTarget;
		$(swgTarget).animate({rotate:"+=0.1deg"},1000,function(){anmSwing_01();});			
	}
	var anmSwing_01 = function (){$(swgTarget).animate({rotate:"+=8deg"},100,function(){anmSwing_02();});}
	var anmSwing_02 = function (){$(swgTarget).animate({rotate:"-=8deg"},100,function(){anmSwing_03();});}
	var anmSwing_03 = function (){$(swgTarget).animate({rotate:"+=8deg"},100,function(){anmSwing_04();});}
	var anmSwing_04 = function (){$(swgTarget).animate({rotate:"-=8deg"},100,function(){anmSwing_05();});}
	var anmSwing_05 = function (){$(swgTarget).animate({rotate:"0deg"},100,function(){anmSwing_00();});}
	
	//アニメーション実行
	anmSwing_00();
}

/* -------------------------------------------------

func_animationFrame-フレームアニメーション

------------------------------------------------- */
function func_animationFrame(element,srcs,interval) {
	var cnt = 0;
	var animationExec = function(){
		//console.log(cnt);
		$(element).attr("src", srcs[cnt]);
		cnt++;
		if(cnt>=srcs.length){
			cnt=0;
		}
	}
	animFrameInterval = setInterval(animationExec,interval);
}

/* -------------------------------------------------

func_anmFrameStop--フレームアニメーション停止

------------------------------------------------- */
function func_animationFrameStop() {
	clearInterval(animFrameInterval);
}

/* -------------------------------------------------

func_animationFall--フォールアニメーション

------------------------------------------------- */
function func_animationFall(element) {
	
	var animationExec = function(){
		//幅/高さ取得
	 	var stageWidth = $(element).width();
        var stageHeight = $(element).height();
        //横幅範囲内でランダム値を取得
        var randX= Math.ceil(Math.random()*stageWidth);
        //名前(ID)
        var flakeName = "flake-"+randX;
        //x座標,Y座標
        var entryLeft = randX;
        var entryTop = "-50px";
        //移動距離(x座標,Y座標)
        var transeDistanceX = Math.ceil(Math.random()*-200+100);
        var transeDistanceY = stageHeight + 50;
        //サイズ
        var randFontSize = Math.ceil(Math.random()*50);
        var flakeSize = randFontSize;
        //カラー
        var colors = ["#fff","#6089BF","#D7A827"];
        var hue = colors[Math.floor(Math.random() * colors.length)];
        //文字
        var letters = ["0","1"];
        var letter = letters[Math.floor(Math.random() * letters.length)];

        //要素を降らす
        var flake = document.createElement("div");
        $(flake).attr({
        	"id": flakeName,
        	"class": "fontFlake"
     	})
     	.css({
     		"top": entryTop,
        	"left": entryLeft,
        	"font-family":"Baloo Bhaina",
        	"font-size": flakeSize,
        	"color": hue
        })
        .text(letter)
        .appendTo(element)
        .animate({
            "top": "+=" + transeDistanceY,
            "left": "+=" + transeDistanceX,
            opacity: 0
        	},
            8000,
            function() {
            	$("#"+flakeName).remove();                      
    		}
        );
	}
	//一定間隔で実行
	animFallInterval = setInterval(animationExec,100);
}

/* -------------------------------------------------

func_anmFallStop--フォールアニメーション停止

------------------------------------------------- */
function func_animationFallStop() {
	clearInterval(animFallInterval);
}

/* -------------------------------------------------

func_animationFactory--ファクトリーラインアニメーション

------------------------------------------------- */
function func_animationFactory() {
	//工場ラインフレームアニメーション
	var srcs = [theme_path + "img/factory01.png",theme_path + "img/factory02.png"];
	func_animationFrame("#line_item img",srcs,250);
	//ブロック移動アニメーション
	func_animationBrick(20000,10000);
}

/* -------------------------------------------------

func_animationFactoryStop--ファクトリーライン停止アニメーション

------------------------------------------------- */
function func_animationFactoryStop() {
	$(".brick").remove();
	func_animationFrameStop();
	func_animationBrickStop();
}

/* -------------------------------------------------

func_animBrick--ブロックアニメーション

------------------------------------------------- */
function func_animationBrick(duration,interval) {
	var i = 0;

	var animationExec = function(){
		//カウント
		i += 1;
		//ブロック要素追加
		var brickName = "brick-item-"+ i;
		var imgSource = theme_path + "img/lg_0" + i + ".png";
		var brick = document.createElement("div");

		$(brick)
		.attr({
			"id": brickName,
			"class": "brick"
		})
		.appendTo("#factory");

		var brickimg = document.createElement("img");
		$(brickimg)
		.attr({
			"src": imgSource
		})
		.appendTo(brick);

		$(brick).css({
			display:"block",
			top:"0",
			left:"85%"
		});

		$(brick).show().stop().animate(
			{
				left:"5%"
			},
			duration,
			"linear",
			function(){
				$(brick).stop().animate(
					{opacity: "0.5"},
					50,
					function(){
						$(brick).remove();
					}
				);
			}
		);
		//リセット
		if(i>=4){
			i=0;
		}
	}
	
	//一定間隔で実行
	// animBrickInterval = setInterval(animationExec,interval);
	animBrickInterval = setInterval(
		(function _re() {
			animationExec();
			return _re;
		}()),
		interval
	);

}

/* -------------------------------------------------

func_anmFBrickStop--ブロックアニメーション停止

------------------------------------------------- */
function func_animationBrickStop() {
	clearInterval(animBrickInterval);
}
















