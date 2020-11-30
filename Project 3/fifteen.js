var item;
var X;
var Y;

window.onload = function() {
	item = document.getElementById('puzzles').getElementsByTagName('div');

	for (var i = 0; i < item.length; i++) {
		item[i].style.backgroundImage = "url('background.jpg')";
		item[i].style.left = (i % 4) * 100 + 'px';
		item[i].style.top = parseInt(i / 4) * 100 + 'px';
		item[i].style.backgroundPosition =
			'-' + item[i].style.left + ' ' + '-' + item[i].style.top;
		item[i].onmouseover = function() {
			if (moved(parseInt(this.innerHTML))) {
				this.style.border = '3px solid red';
				this.style.color = 'green';
				this.style.textDecoration = 'underline';
			}
		};

		item[i].onmouseout = function() {
			this.style.border = '2px solid black';
			this.style.color = 'black';
			this.style.textDecoration = 'none';
		};

		item[i].onclick = function() {
			if (moved(parseInt(this.innerHTML))) {
				swap_locations(this.innerHTML - 1);
				return;
			}
		};
	}

	var shuffle = document.getElementById('suffle');
	Y = '300px';
	X = '300px';
	shuffle.onclick = function() {
		for (var i = 0; i < 300; i++) {
			var random = parseInt(Math.random() * 100) % 4;

			var temp = move(Y, X, random);

			if (temp != -1) {
				swap_locations(temp);
			}
		}
	};
};

function move(x, y, random) {
	var x = parseInt(x);
	var y = parseInt(y);
	if (x > 0 && random == 0) {
		for (var i = 0; i < item.length; i++) {
			if (
				parseInt(item[i].style.left) + 100 == x &&
				parseInt(item[i].style.top) == y
			) {
				return i;
			}
		}
	} else if (x < 300 && random == 1) {
		for (var i = 0; i < item.length; i++) {
			if (
				parseInt(item[i].style.left) - 100 == x &&
				parseInt(item[i].style.top) == y
			) {
				return i;
			}
		}
	} else if (y > 0 && random == 2) {
		for (var i = 0; i < item.length; i++) {
			if (
				parseInt(item[i].style.top) + 100 == y &&
				parseInt(item[i].style.left) == x
			) {
				return i;
			}
		}
	} else if (y < 300 && random == 3) {
		for (var i = 0; i < item.length; i++) {
			if (
				parseInt(item[i].style.top) - 100 == y &&
				parseInt(item[i].style.left) == x
			) {
				return i;
			}
		}
	} else {
		return -1;
	}
}
function moved(position) {
	if (move(Y, X, 0) == position - 1) {
		return true;
	} else if (move(Y, X, 1) == position - 1) {
		return true;
	} else if (move(Y, X, 2) == position - 1) {
		return true;
	} else if (move(Y, X, 3) == position - 1) {
		return true;
	}
}
function swap_locations(position) {
	var temp_position = item[position].style.top;
	item[position].style.top = X;
	X = temp_position;
	temp_position = item[position].style.left;
	item[position].style.left = Y;
	Y = temp_position;
}
