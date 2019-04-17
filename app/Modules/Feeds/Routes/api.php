<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

Route::resource('feed', 'FeedController')->only(['index', 'show']);