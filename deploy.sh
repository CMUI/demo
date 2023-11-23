#!/bin/sh

# 基本信息
APP_NAME='cmui.net'
# 源码目录
SRC_DIR=$( pwd )
DIST_DIR="${SRC_DIR}"
# 应用目录
CASE_DIR="/opt/case"
APP_DIR="${CASE_DIR}/${APP_NAME}"
DEST_DIR="${APP_DIR}"
BAK_DIR="${CASE_DIR}/_backup/${APP_NAME}"

echo "APP_NAME: $APP_NAME"
echo "SRC_DIR:  $SRC_DIR"
echo "DIST_DIR: $DIST_DIR"
echo "CASE_DIR: $CASE_DIR"
echo "APP_DIR:  $APP_DIR"
echo "DEST_DIR: $DEST_DIR"
echo "BAK_DIR:  $BAK_DIR"


function begin() {
	echo ''
	echo '[BEGIN] Starting...'
}

function build() {
	echo ''
	echo '[BUILD] No need to build.'
}

function package() {
	echo ''

	# 清空目标目录
	echo '[PKG] Clearing DEST dir...'
	[ -d "${DEST_DIR}" ] && rm -rf "${DEST_DIR}"
	mkdir -p "${DEST_DIR}"
	echo '[PKG] Cleared!'
}

function sync() {
	echo ''
	echo '[SYNC] Copying files...'
	rsync -av --delete --exclude-from=".dockerignore" "${DIST_DIR}/" "${DEST_DIR}"
	echo '[SYNC] Copied!'
}

function end() {
	echo ''
	echo '[END] Done!'
}

begin
build
package
sync
end
