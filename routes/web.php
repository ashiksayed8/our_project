<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front_view.index');
});

Auth::routes();
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');


Route::get('/home', 'HomeController@index')->name('home');

//Admin router============================================

Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login')->name('admin.login');
Route::get('/admin/register', 'Admin\customRegisterController@RegisterForm')->name('admin.register');
Route::post('/admin/register', 'Admin\customRegisterController@Register');
Route::get('/admin/home', 'AdminController@index');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


//Category=========================

Route::get('admin/categories','Admin\Product_section\CategoryController@category')->name('categories');
Route::post('admin/insert/category','Admin\Product_section\CategoryController@insertcategory')->name('store.category');
Route::get('delete/category/{id}','Admin\Product_section\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\Product_section\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\Product_section\CategoryController@UpdateCategory');

//SubCategory=========================

Route::get('admin/subcategories','Admin\Product_section\SubCategoriesController@subcategory')->name('subcategories');
Route::post('admin/insert/subcategory','Admin\Product_section\SubCategoriesController@InsertSubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\Product_section\SubCategoriesController@DeleteSubcategory');
Route::get('edit/subcategory/{id}','Admin\Product_section\SubCategoriesController@EditSubcategory');
Route::post('update/subcategory/{id}','Admin\Product_section\SubCategoriesController@UpdateSubcategory');


//Brand=============================================

Route::get('admin/brands','Admin\Product_section\BrandController@brand')->name('brands');
Route::post('admin/insert/brand','Admin\Product_section\BrandController@InsertBrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Product_section\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\Product_section\BrandController@EditBrand');
Route::post('update/brand/{id}','Admin\Product_section\BrandController@UpdateBrand');


//Coupon=========================

Route::get('admin/coupons','Admin\Product_section\CouponController@Coupon')->name('coupons');
Route::post('admin/insert/coupon','Admin\Product_section\CouponController@InsertCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\Product_section\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Admin\Product_section\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Admin\Product_section\CouponController@UpdateCoupon');

//Product====================================

Route::get('admin/product/all','Admin\Product_section\ProductController@index')->name('all.product');
Route::get('admin/product/add','Admin\Product_section\ProductController@create')->name('add.product');
Route::post('admin/product/store','Admin\Product_section\ProductController@InsertProduct')->name('store.product');
Route::get('inactive/product/{id}','Admin\Product_section\ProductController@Inactive');
Route::get('active/product/{id}','Admin\Product_section\ProductController@Active');
Route::get('delete/product/{id}','Admin\Product_section\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\Product_section\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\Product_section\ProductController@EditProduct');
Route::post('update/product/{id}','Admin\Product_section\ProductController@UpdateProduct');



//Admin order section ==============================

Route::get('admin/pending/order', 'Admin\OrderController@Neworder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment/', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment/', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment/', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment/', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');



//Seo setting ==================================

Route::get('admin/seo/', 'Admin\SeoController@SeoShow')->name('admin.seo');
Route::post('update/seo/{id}','Admin\SeoController@SeoUpdate');



//GET subcategory using ajax==============
Route::get('get/subcategory/{category_id}','Admin\Product_section\ProductController@GetSubcat');






//Fonted Route==============================================================
//Wishlist===============================
Route::get('add/wishlist/{id}','WishlistController@Addwishlist');

//Addcart===============================
Route::get('add/cart/{id}','CartController@AddCart');
Route::get('check','CartController@check');
Route::get('products/cart','CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@RemoveCart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('remove/coupon/','CartController@CouponRemove')->name('remove.coupon');
Route::get('payment/page/','CartController@PymentPage')->name('payment.step');

//payment method===========================

Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@STripeCharge')->name('stripe.charge');






//Product details show====================================

Route::get('product/details/{id}/{product_name}/','ProductController@ProductView');
Route::get('cart/product/add/{id}/','ProductController@AddCart');





