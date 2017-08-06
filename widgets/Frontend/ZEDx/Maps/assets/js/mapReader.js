jQuery(function($) {
    var elementId = "ZxMap";
    var tip;
    var transform = function(method) {
        if (method.charAt(0) == 't') {
            return 'translate('+method.substring(1)+')';
        }
    }

    var createSvgElement = function(mapData) {
        //Width and height
        var width = mapData.attributes.width,
            height = mapData.attributes.height,
            svgWidth = mapData.width,
            svgHeight = mapData.height;

        //Create SVG element
        var svg = d3.select('#' + elementId).append("svg")
            .attr("id", "svg")
            .attr("viewBox", "0 0 "+svgWidth+" "+svgHeight)
            .attr("width", width)
            .attr("height", height);


        // Add tooltip
        tip = d3.tip()
          .attr('class', 'd3-tip')
          .offset([-10, 0])
          .html(function(d) {
            return d.name;
          })

        svg.call(tip);

        return svg;
    }

    var createGroupElement = function(mapData) {

        var group = createSvgElement(mapData).append("g");
        console.log(transform(mapData.transform));
        group.attr('transform', transform(mapData.transform));

        return group;
    }

    $(document).on("ZxMapLoad", function(e, map) {
        $element = $("#"+elementId);

        $element.empty();
        var mapUrl = $element.data('url')+"/"+map;
        var baseUrl = $element.data('base-url');

        //Load in GeoJSON data
        d3.json(mapUrl, function(req, mapData) {
            var group = createGroupElement(mapData),
                attributes = mapData.attributes;
            delete attributes.width;
            delete attributes.height;

            $.each(mapData.paths, function(key, path){
                group.append("path")
                    .datum(path)
                    .attr(attributes)
                    .attr("d", function(d) { return d.path})
                    .on('mouseover', function(d) {
                        d3.select(this).attr(mapData.animate.attributes);
                        tip.show(d);
                    })
                    .on('mouseout', function(d) {
                        d3.select(this).attr(attributes);
                        tip.hide(d);
                    })
                    .on('click', function(path) {
                        link = baseUrl + "/ad/search/categories/" + path.name + "-" + mapData.country + "?q=&c=all&lat=" + path.lat + "&lng=" + path.lng + "&radius=" + path.radius + "&us=all";
                        location.href = link;
                    });
            });
        });
    })
});
