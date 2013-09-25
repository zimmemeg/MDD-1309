function searchPics(yourKeywords) {
            
            $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
            {
                lang    : 'en-us',
                tags    : yourKeywords,
                tagmode : 'all',
                limit   : '50',
                format  : 'json'
            },
            function(data){
                    
                var imgInsert = "";
                var items = [];
                
                //create the element that holds the images
                $('<div/>', {
                    'id': 'content',
                    html: items.join('')
                }).appendTo('#listing-wrapper').insertAfter('#left_sidebar');
                
                /* each image loaded from flickr will have a div as parent then the main parent
                will apend to the wrapper */
                $.each(data.items, function(i,item){
                    if (i == 50) return false;
                    var imgThumb = item.media.m.split('m.jpg')[0] + 'm.jpg'; //size of the image small max 240px
                    var imgLarge = item.media.m.split('m.jpg')[0] + 'b.jpg'; //large size of the image for fancybox

                    imgInsert += '<div class="avatar">';
                    imgInsert += '<a href="' + imgLarge + '" rel="flickr_group" class="big_img" title="' + item.title + '">';
                    imgInsert += '<img title="' + item.title + '" src="' + imgThumb + '" alt="' + item.title + '" />';
                    imgInsert += '</a></div>';
                });
                var cachedItems = $(imgInsert).data('cached', imgInsert);
                
                $('#content').append(imgInsert).addClass(yourKeywords).data('cached', data.items);
                
                /* create a history list and insert it into the left sidebar */
                var listChached = '';
                listChached += '<div class="history_list">';
                listChached += '<a class="' + yourKeywords + '_chached" href="javascript:;">';
                listChached +=  yourKeywords + '</a></div>';

                $(listChached).appendTo('#left_sidebar').insertAfter('form');
    
                $('.' + yourKeywords + '_chached').click(function(){
                    
                    /* if the content has items then remove them
                    and insert the chathed itmes */
                    if ( $('#content').length > 0 ) {  
                        $('#content').empty();
                        $('#content').html(cachedItems);
                        
                        //open the images using fancybox for the cached images
                        $("a[rel=flickr_group]").fancybox({
                            'transitionIn': 'none',
                            'transitionOut': 'none',
                            'titlePosition': 'over',
                            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                            }
                        });                             
                    }                        
                })

                //open the images using fancybox for the new search
                $("a[rel=flickr_group]").fancybox({
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'titlePosition': 'over',
                    'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                        return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                    }
                });                
            });
        }
        
        $(function(){
            $('.search_form').submit(function(){
                //if it has been a search already remove the old content and replace it with the new search
                if ( $('#content').length > 0 ) {
                    $('#content').remove();
                }                        
                searchPics(document.getElementById('keywords').value );
				return false;
            })
        })