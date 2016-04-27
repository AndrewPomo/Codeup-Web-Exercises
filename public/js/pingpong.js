"use strict";
(function() {
			
    $(document).ready(function() {

    	$(function(){
			$('#swing2').click(function(){
				$('#thickboxId').click();
			});
		});

    	function getRandomArbitrary(min, max) {
			return Math.random() * (max - min) + min;
		}

    	function swingPositions(swing) {
    	var horiPos = getRandomArbitrary(100, 1000);
    	var vertPos = getRandomArbitrary(200, 700);
	    	$(swing).css({
	    		'top': vertPos + 'px',
	    		'left': horiPos + 'px',
	    	});
	    	console.log(vertPos + 'px')
	    	console.log('This ran');
	    };

	    swingPositions('#swing1');
	    swingPositions('#swing2');
	    swingPositions('#swing3');
	    swingPositions('#swing4');
	    swingPositions('#swing5');
	    swingPositions('#swing6');
	    swingPositions('#swing7');
	    swingPositions('#swing8');
	    swingPositions('#swing9');
	    swingPositions('#swing10');
	    swingPositions('#swing11');
	    swingPositions('#swing12');
	    swingPositions('#swing13');
	    swingPositions('#swing14');
	    swingPositions('#swing15');
    });

    console.log('this works');
})();