<?php

namespace rodrigoq\ffmpeg;

class Ffmpeg
{
	const BIN = 'ffmpeg';
	const PROBE_BIN = 'ffprobe';

	public static function GetBin() : string
	{
		self::SetX(self::BIN);
		return self::BIN;
	}

	public static function GetBinFullPath() : string
	{
		self::SetX(self::BIN);
		return realpath(self::GetPath() . '/' . self::BIN);
	}

	public static function GetProbeBin() : string
	{
		self::SetX(self::PROBE_BIN);
		return self::PROBE_BIN;
	}

	public static function GetProbeBinFullPath() : string
	{
		self::SetX(self::PROBE_BIN);
		return realpath(self::GetPath() . '/' . self::PROBE_BIN);
	}

	public static function GetPath() : string
	{
		return realpath(__DIR__ . '/../bin');
	}

	public static function setX(string $bin) : void
	{
		$file = realpath(self::GetPath() . '/' . $bin);
		if(fileperms($file) & 0777 !== 0755)
			chmod($file, 0755);
	}
}

