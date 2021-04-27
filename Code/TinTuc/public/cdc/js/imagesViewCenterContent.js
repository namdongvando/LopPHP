var imagesViewCenterContent = function(images) {

    var self = this;

    this.HiChuNhatNgang = function(images, height, width) {
        var dataconfig = images.data();
        var newWidth = width;
        var newHeight = dataconfig.height;
        var left = 0;
        var top = 0;
        images.css({"max-width": newWidth});
        newWidth = (dataconfig.height / height) * width;
        left = -1 * ((newWidth - dataconfig.width) / 2);
        self.configimgages(images, newHeight, newWidth, left, top);
    }


    this.HiChuNhatDoc = function(images, height, width) {
        var dataconfig = images.data();
        var newWidth = dataconfig.width;
        var newHeight = height;
        var left = 0;
        var top = 0;
        newHeight = (dataconfig.width / width) * newHeight;
        images.css({"max-height": newHeight});
        top = -1 * ((newHeight - dataconfig.height) / 2);
        self.configimgages(images, newHeight, newWidth, left, top);
    }
    this.configimgages = function(images, newHeight, newWidth, left, top) {
        images.height(newHeight);
        images.css({"left": left});
        images.css({"top": top});
        images.width(newWidth);
    }

    images.load(function() {
//        console.log($(this).data());
//        console.log($(this).naturalHeight());
        var height = $(this)[0].naturalHeight;
        var width = $(this)[0].naturalWidth;
        if (width > height) {
            self.HiChuNhatNgang($(this), height, width);
        } else {
            self.HiChuNhatDoc($(this), height, width);
        }

    });


}
$(".imagesViewCenterContent").each(function() {
    new imagesViewCenterContent($(this));
});