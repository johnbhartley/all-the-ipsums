<?php 

$gouda = array(
	
);

$(function () {
    jQuery.extend({
        random: function (c) {
            return Math.floor(c * (Math.random() % 1))
        },
        randomBetween: function (d, c) {
            return d + jQuery.random(c - d + 1)
        }
    });

    function b(d, c) {
        if (!Array.indexOf) {
            Array.prototype.indexOf = function (m) {
                var k = 0,
                    j = this.length;
                for (; j--; k++) {
                    if (this[k] == m) {
                        return k
                    }
                }
                return -1
            }
        }
        var f, g, e = [],
            h = c || 1;
        if (d instanceof Array === false || h > (f = d.length)) {
            return null
        }
        while (e.length != h) {
            g = Math.floor(Math.random() * f);
            if (e.indexOf(g) == -1) {
                e.push(g)
            }
        }
        return h == 1 ? e[0] : e
    }

    function a(c) {
        return c.charAt(0).toUpperCase() + c.substr(1)
    }
    $("#generator").submit(function () {
        $("#output p").remove();
        var e = Array("everyone loves", "the big cheese", "say cheese", "hard cheese", "cut the cheese", "cheese on toast", "chalk and cheese", "who moved my cheese", "cheesy grin", "cheesy feet", "rubber cheese", "cheese and wine", "cheese and biscuits", "cheeseburger", "cauliflower cheese", "fromage", "croque monsieur", "cheese strings", "cheese slices", "cheese triangles", "macaroni cheese", "smelly cheese", "cheesecake", "cow", "goat", "squirty cheese", "melted cheese", "fondue", "airedale", "babybel", "bavarian bergkase", "blue castello", "bocconcini", "boursin", "brie", "caerphilly", "camembert de normandie", "cheddar", "cottage cheese", "cream cheese", "danish fontina", "dolcelatte", "edam", "emmental", "feta", "fromage frais", "gouda", "halloumi", "jarlsberg", "lancashire", "manchego", "mascarpone", "monterey jack", "mozzarella", "paneer", "parmesan", "pecorino", "pepper jack", "port-salut", "queso", "red leicester", "ricotta", "roquefort", "st. agur blue cheese", "stilton", "stinking bishop", "swiss", "taleggio", "when the cheese comes out everybody's happy");
        var g = e.length;
        var k = $("#paragraphs").val();
        var m = $("input[type=radio]:checked").val();
        var h = 0;
        var d = 0;
        var f = 0;
        var c = false;
        if ($("input[type=checkbox]:checked").val() == "true") {
            c = true
        }
        switch (m) {
        case "short":
            f = 15;
            d = 25;
            break;
        case "medium":
            f = 30;
            d = 50;
            break;
        case "long":
            f = 55;
            d = 75;
            break
        }
        for (i = 0; i < k; i++) {
            var l = "<p>";
            if (c == true && i == 0) {
                var j = "I love cheese, especially "
            } else {
                j = a(e[b(e)]) + " "
            }
            h = $.randomBetween(f, d);
            for (x = 0; x <= h; x++) {
                if (x % 7 == 1) {
                    j += e[b(e)] + ". " + a(e[b(e)]) + " "
                } else {
                    j += e[b(e)] + " "
                }
            }
            l += $.trim(j) + ".</p>";
            $("#output").append(l)
        }
        return false
    })
});