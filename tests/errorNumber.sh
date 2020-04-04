#!/bin/bash

INPUT=$(cat /dev/stdin)

NUMBER_OF_ERRORS=$(echo "${INPUT}" | grep " | ERROR | " | wc -l)

if [[ "$NUMBER_OF_ERRORS" -eq "$1" ]]; then
	exit 0
else
	echo "${INPUT}" > /dev/stderr
	exit 1
fi;

