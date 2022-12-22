$(function() {
  
  //satu
  $('#dropzone1').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone1').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone1 input').on('change', function(e) {
    var file = this.files[0];
    $('#dropzone1 input').attr('title', '')
    $('#dropzone1 input').attr('alt', '')
    $('#dropzone1').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone1').addClass('dropped');
    $('#dropzone1 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone1 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone1 div').html(ext);
    }
  });
  
  
  //dua
  $('#dropzone2').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone2').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone2 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone2').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone2').addClass('dropped');
    $('#dropzone2 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone2 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone2 div').html(ext);
    }
  });
  
  
  //tiga
  $('#dropzone3').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone3').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone3 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone3').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone3').addClass('dropped');
    $('#dropzone3 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone3 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone3 div').html(ext);
    }
  });
  
  //empat
  $('#dropzone4').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone4').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone4 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone4').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone4').addClass('dropped');
    $('#dropzone4 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone4 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone4 div').html(ext);
    }
  });
  
  
  //lima
  $('#dropzone5').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone5').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone5 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone5').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone5').addClass('dropped');
    $('#dropzone5 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone5 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone5 div').html(ext);
    }
  });
  
  
  //enam
  $('#dropzone6').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone6').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone6 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone6').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone6').addClass('dropped');
    $('#dropzone6 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone6 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone6 div').html(ext);
    }
  });
  
  
  //tujuh
  $('#dropzone7').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone7').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone7 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone7').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone7').addClass('dropped');
    $('#dropzone7 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone7 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone7 div').html(ext);
    }
  });
  
  
  //delapan
  $('#dropzone8').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone8').on('dragleave', function() {
    $(this).removeClass('hover');
  });
  
  $('#dropzone8 input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone8').removeClass('hover');
    
    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('File type not allowed.');
    }
    
    $('#dropzone8').addClass('dropped');
    $('#dropzone8 img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone8 div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone8 div').html(ext);
    }
  });
  
});