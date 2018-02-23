#!/usr/bin/ruby
require 'rubygems'
require 'json'
require 'httparty'

# Class To interact with a Plex server, for pulling movie and TV info and stuff
#
# Author: Brian Stascavage
# Email: brian@stascavage.com
#
class Plex
    include HTTParty

    def initialize(config)
        $advanced = config
        $header = { "X-Plex-Token" => "#{$advanced['plex']['api_key']}" }

        self.class.headers['X-Plen-Token'] = $advanced['plex']['api_key']
        if !$advanced['plex']['server'].nil?
            self.class.base_uri "http://#{$advanced['plex']['server']}:32400/"
        end
    end

    base_uri "http://localhost:32400/"
    format :xml

    def get(query, args=nil)
        self.class.headers['X-Plex-Token'] = $advanced['plex']['api_key']
        response = self.class.get(query)

        if response.code != 200
            if response.code == 401
                $logger.error("Unauthorized access to Plex server")
            else
                $logger.error("Cannot connect to Plex server")
            end
            
            abort
        end

        $logger.debug("Debug info for plexmediaserver connection")
        $logger.debug(response.code)
        $logger.debug(response.request)
        $logger.debug(response)
        return response
    end
end
