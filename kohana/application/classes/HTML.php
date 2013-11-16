<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML {
  
  // Override existing HTML::anchor()
  
  /**
	 * Create HTML link anchors. Note that the title is not escaped, to allow
	 * HTML elements within links (images, etc).
	 *
	 *     echo HTML::anchor('/user/profile', 'My Profile');
	 *
	 * @param   string   URL or URI string
	 * @param   string   link text
	 * @param   array    HTML anchor attributes
	 * @param   mixed    protocol to pass to URL::base()
	 * @param   boolean  include the index page
	 * @return  string
	 * @uses    URL::base
	 * @uses    URL::site
	 * @uses    HTML::attributes
	 */
	public static function anchor($uri, $title = NULL, array $attributes = NULL, $protocol = NULL, $index = FALSE)
	{
		if ($title === NULL)
		{
			// Use the URI as the title
			$title = $uri;
		}

		if ($uri === '')
		{
			// Only use the base URL
			$uri = URL::base($protocol, $index);
		}
		else
		{
			if (strpos($uri, '://') !== FALSE)
			{
				if (HTML::$windowed_urls === TRUE AND empty($attributes['target']))
				{
					// Make the link open in a new window
					$attributes['target'] = '_blank';
				}
			}
			elseif ($uri[0] !== '#')
			{
				// Make the URI absolute for non-id anchors
				$uri = URL::site($uri, $protocol, $index);
			}
		}

		// Add the sanitized link to the attributes
		$attributes['href'] = $uri;

		return '<a'.HTML::attributes($attributes).'>'.$title.'</a>';
	}
	
	public static function menu_item($controller, $action, $title = NULL, array $attributes = NULL, $protocol = NULL, $index = FALSE)
	{
		$request = Request::initial();
		$uri = $action != "index" ? $controller."/".$action : $controller;
		$li['class'] = (ucfirst(Request::current()->controller()) == ucfirst($controller) && ucfirst(Request::current()->action()) == ucfirst($action)) ? 'active' : NULL;
		
		$title = $title ?: $uri;

		$uri = URL::site($uri, $protocol, $index);
		// Add the sanitized link to the attributes
		$attributes['href'] = $uri;

		return '<li' .HTML::attributes($li).'><a'.HTML::attributes($attributes).'>'.$title.'</a></li>';
	}

	
	public static function dropdown(array $menu)
	{
		
		$controller = $menu['controller'];
		$action = $menu['action'];
		$url = URL::site($action != "index" ? $controller."/".$action : $controller, NULL, FALSE);
		$title = $menu['title'] ?: $url;
		$dropdownMenu = '<li class="dropdown">' . PHP_EOL;
		$dropdownMenu .= '<a ' . HTML::attributes(array('href' => $url, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'data-target' => 'dropdown')) . '>' . $title . ' <span class="caret"></span></a>' . PHP_EOL;
		$dropdownMenu .= '<ul class="dropdown-menu">' . PHP_EOL;
		
		foreach ( $menu['sub'] as $item )
		{
			if (isset($item['sub']) AND count($item['sub']))
			{
				$dropdownMenu .= HTML::dropdown($item);
			}
			else
			{
				$dropdownMenu .= HTML::menu_item($item['controller'], $item['action'], $item['title']);
			}
		}
		$dropdownMenu .= '</li>' . PHP_EOL;
		$dropdownMenu .= '</ul>' . PHP_EOL;
		
		return $dropdownMenu;
	}
}
