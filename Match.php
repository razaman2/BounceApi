<?php

	namespace BounceApi;

	use BounceApi\response\MatchResponse;

	class Match extends AbstractRequestObject
	{
		private $searchInfo;

		public function __construct(SearchInfo $searchInfo)
		{
			$this->name = "Match";
			$this->searchInfo = $searchInfo;
		}

		public function getXml()
		{
			return '
				<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
    				<Body>
        				<Match xmlns="http://tempuri.org/">'
                            .$this->searchInfo->getXml().
        				'</Match>
    				</Body>
				</Envelope>';
		}

		public function setResult($result)
		{
			return new MatchResponse($result);
		}
	}