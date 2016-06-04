jQuery(function($){
    var elementId = "ZxMap";
    $(document).on("ZxMapLoad", function (e, map) {
        $.ajax({ url : $("#"+elementId).data('url')+"/"+map, cache: true, success : function( __ZEDxMap ) {
            __ZEDxMap = JSON.parse(__ZEDxMap);
            $("#"+elementId).empty();
            var width = __ZEDxMap.attributes.width;
            var height = __ZEDxMap.attributes.height;
            var svgHeight = __ZEDxMap.height;
            var svgWidth = __ZEDxMap.width;

            var paper = Raphael(elementId, width, height);
            paper.setViewBox(0, 0, svgWidth, svgHeight, true);
            paper.safari();
            var attributes = __ZEDxMap.attributes,
                arr = [],
                st = paper.set();
            delete attributes.width;
            delete attributes.height;
            console.log(attributes);
            for (var path in __ZEDxMap.paths) {
                var pathObj = paper.path(__ZEDxMap.paths[path].path);
                arr[pathObj.id] = path;
                pathObj.attr(attributes);
                pathObj.hover(function(){
                    this.animate(__ZEDxMap.animate.attributes);
                }, function(){
                    this.animate({
                        fill: attributes.fill
                    });
                })
                .click(function(){
                    var path = __ZEDxMap.paths[arr[this.id]],
                        link = "ad/search/categories/" + path.name + "?q=&c=all&lat=" + path.lat + "&lng=" + path.lng + "&radius=" + path.radius + "&us=all";
                    location.href = link;
                });

                st.push(pathObj);
                $('.tooltip').tooltip({container:'body'});
            }
            if (__ZEDxMap.transform) {
                st.transform(__ZEDxMap.transform);
            }
        }});
    })
});
jQuery.expr[':'].raph=function
(objNode,intStackIndex,arrProperties,arrNodeStack){var c=objNode.getAttribute('class');return(c&&c.indexOf(arrProperties[3])!=-1);}
