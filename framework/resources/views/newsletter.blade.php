<div style="margin: 0px; padding: 0px; font-size: 100%;  height: 100%; background: rgb(248, 248, 248); width: 100%;">

    @php
        $stores=array_slice($storeCoupon['coupons'], 0, 1, true);
        $email = $storeCoupon['email'];
    @endphp
    
    <table style="margin: 0px; padding: 0px; font-size: 100%; height: 100%; background: rgb(248, 248, 248); width: 100%;" width="100%" height="100%">
      <tbody><tr style="margin: 0px; padding: 0px; font-size: 100%;">
        <td style="padding: 0px; font-size: 100%;  display: block; clear: both; margin: 0px auto; max-width: 580px;">

          
          <table style="margin: 0px; padding: 0px; font-size: 100%;  border-collapse: collapse; width: 100%;" width="100%">
            <tbody><tr style="margin: 0px; padding: 0px; font-size: 100%; ">
              <td style="margin: 0px; font-size: 100%;  padding: 5px;">
                <table style="margin: 0px 0px 5px; padding: 0px; font-size: 100%; background-color: rgb(255, 255, 255); border-collapse: collapse; width: 100%;" width="100%" bgcolor="#FFF">
                  <tbody>
                    <tr style="margin: 0px; padding: 0px; font-size: 100%;">
                    @foreach($stores as $store)
                    
                      <td style="margin: 0px; font-size: 100%; padding: 5px;">
                        Here are the new deals we have found for
                        <strong style="margin: 0px; padding: 0px; font-size: 100%;font-weight: 600;">{{$store->store_name}}
                           </strong>.
                      </td>
                      @endforeach
                    </tr>
                </tbody>
              </table>
              
              @foreach($storeCoupon['coupons'] as $storeCoupon)
              <table style="margin: 0px 0px 5px; padding: 0px; font-size: 100%; background-color: rgb(255, 255, 255); border-collapse: collapse; width: 100%;" width="100%" bgcolor="#FFF">
                <tbody>
                  <tr style="margin: 0px; padding: 0px; font-size: 100%; ">
                    <td style="margin: 0px; font-size: 100%;  padding: 5px; width: 55px;" width="55">
                      <img style="padding: 0px; font-size: 100%; max-width: 100%; margin: 0px auto; display: block; height: 55px; width: 55px;" src="https://dealrated.com/framework/public/assets/store_images/{{$storeCoupon->image}}"
                      data-src="https://dealrated.com/framework/public/assets/store_images/{{$storeCoupon->image}}"width="55" height="55">
                    </td>
                    <td style="margin: 0px; font-size: 100%;  padding: 5px;">
                        <div style="margin: 0px; padding: 0px 0px 0px 2px;  font-weight: 600; font-size: 14px; line-height: 16px;">COUPON CODE</div>
                        <div style="margin: 0px; padding: 0px 0px 0px 2px;  font-weight: 700; font-size: 20px; line-height: 20px; text-transform: uppercase;">{{$storeCoupon->coupon_off}} % OFF</div>
                        
                        <div style="margin: 0px; padding: 0px 0px 0px 2px;  font-weight: 600; font-size: 16px; line-height: 16px;">at {{$storeCoupon->store_name}}</div>
                         
                        <table style="margin: 0px; padding: 0px; font-size: 100%;  border-collapse: separate; border-spacing: 4px; width: 100%;" width="100%">
                            <tbody>
                              <tr style="margin: 0px; padding: 0px; font-size: 100%;">
                                <td style="margin: 0px; font-size: 100%;  text-align: center; padding: 8px 3px 6px; background-color: #41c685; line-height: 15px;" bgcolor="#7267D3" align="center"><a href="https://dealrated.com/store/{{$storeCoupon->slug}}" style="margin: 0px; padding: 0px; font-size: 100%;  text-decoration: none; color: rgb(255, 255, 255); font-weight: 700; line-height: 15px;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.dealrated.com/email-exit?slug%3Dforce-of-nature&amp;source=gmail&amp;ust=1599109834727000&amp;usg=AFQjCNFYoA20o4NV7YceeeDh4pfbEC_vsA">VISIT STORE</a>
                                </td>
                               
                                <td style="margin: 0px; font-size: 100%;  text-align: center; padding: 8px 3px 6px; background-color: #41c685; line-height: 15px;" bgcolor="#7267D3" align="center"><a href="https://dealrated.com/store/{{$storeCoupon->slug}}#c={{$storeCoupon->coupon_id}}" style="margin: 0px; padding: 0px; font-size: 100%; text-decoration: none; color: rgb(255, 255, 255); font-weight: 700; line-height: 15px;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.dealrated.com/{{$storeCoupon->slug}}?utm_source%3Dwethrift%26utm_medium%3Demail&amp;source=gmail&amp;ust=1599109834727000&amp;usg=AFQjCNG5u_I-PRadAwE7XhA6kKvHOW-f7g">GET COUPON</a>
                                </td>
                                
                              </tr>
                            </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                 
                @endforeach
              </td>
            </tr>
          </tbody></table>
        </td>
      </tr>
       
      <tr style="margin: 0px; padding: 0px; font-size: 100%; ">
        <td style="padding: 0px; font-size: 100%; display: block; clear: both; margin: 0px auto; max-width: 580px;">
          <table style="margin: 0px; padding: 0px; font-size: 100%;  border-collapse: collapse; width: 100%;" width="100%">
            <tbody>
              <tr style="margin: 0px; padding: 0px; font-size: 100%; ">
                <td align="center" style="margin: 0px; font-size: 100%;  padding: 5px;">
                  <!--<p style="margin: 0px 0px 20px; padding: 0px;  font-size: 16px; font-weight: normal;">Sent by <a href="https://www.wethrift.com/?utm_source=wethrift&amp;utm_medium=email" style="margin: 0px; padding: 0px; font-size: 100%; color: rgb(114, 103, 211); text-decoration: none;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.wethrift.com/?utm_source%3Dwethrift%26utm_medium%3Demail&amp;source=gmail&amp;ust=1599109834727000&amp;usg=AFQjCNHlQFe-9SF4bKZOcNIQI5dk_J8AGw"><span class="il">Wethrift</span>.com</a>, 340 S LEMON AVE #1262, WALNUT, CA 91789, USA</p>-->
                  
                  <p style="margin: 0px 0px 20px; padding: 0px;  font-size: 16px; font-weight: normal;">If you want to unsubscribe, please click here <a href="https://www.dealrated.com/email-unsubscribe?email={{$email}}&store={{$storeCoupon->store_id}}" style=" display:block; margin: 5px; padding: 0px; font-size: 100%; color: #41c685; text-decoration: none;" target="_blank" >Unsubscribe</a></p>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>