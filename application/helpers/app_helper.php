<?php


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class app_helper
{
	/**
	 * @param array|null $parameters
	 * @return ContainerBuilder
	 * @throws Exception
	 */
	public static function getContainer(array $parameters = null)
	{
		$containerBuilder = new ContainerBuilder();
		if (isset($parameters)) {
			foreach ($parameters as $parameterName => $parameterValue) {
				$containerBuilder->setParameter($parameterName, $parameterValue);
			}
		}
		$loader = new XmlFileLoader($containerBuilder, new FileLocator(APPPATH));
		$loader->load('services.xml');
		return $containerBuilder;
	}
}
