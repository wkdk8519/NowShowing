FROM php:7.2.2-fpm-alpine3.7
MAINTAINER ninthwalker

ENV UPDATED_ON 17FEB2018
ENV NOWSHOWING_VERSION 2.0

VOLUME /config
EXPOSE 6878 

#copy app and s6-overlay files
COPY root/ s6-overlay/ /

# Install permanent packages
RUN apk add --no-cache ruby ruby-json ruby-io-console curl-dev lighttpd tzdata shadow && \

# Install temporary build dependencies
apk add --no-cache --virtual build-dependencies \
ruby-dev \
ruby-bundler \
libc-dev \
make \
gcc && \

# Create default user
groupmod -g 1000 users && \
useradd -u 99 -U -d /config -s /bin/false xyz && \
groupmod -o -g 100 xyz && \
usermod -G users xyz && \

# Insall NowShowing app dependencies
bundle config --global silence_root_warning 1 && \
cd /opt/gem ; bundle install && \

# Remove temp files
apk del --purge build-dependencies

# Start s6 init & webserver
ENTRYPOINT ["/init"]
CMD ["lighttpd" "-D" "-f" "/etc/lighttpd/lighttpd.conf"]
