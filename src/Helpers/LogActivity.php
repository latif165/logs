<?php

namespace Ds\Logs\Helpers;

use Ds\Logs\Models\ActivityLog;

class LogActivity
{

	/**
	 * Author: Muhammd Latif
	 * info
	 * Description: This funcation will store user activity logs in database. That will helps
	 * for tracking user activities. It will store url, method, ip, user-agent, user id and subect
	 * of user activity.
	 * @param $subject
	 * @return void
	 */

	public static function info($subject)
	{
		$logActivity = [];
		$logActivity['subject'] = $subject;
		$logActivity['url'] = request()->fullUrl();
		$logActivity['method'] = request()->method();
		$logActivity['ip'] = request()->ip();
		$logActivity['agent'] = request()->header('user-agent');
		$logActivity['user_id'] = auth()->check() ? auth()->user()->id : null;
		ActivityLog::create($logActivity);
	}
}
