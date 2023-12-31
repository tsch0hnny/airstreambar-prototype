#!/bin/bash

# List 1
list1=(
#E6D9D1
#823D38
#463639
#75CCA6
#BD4200
#F39F00
#D66806
#FEEE8E
#EDE4DB
#C98502
#EBC04D
#E9CE8E
#F89E64
#DA1903
#f2dd21
#efde8b
#C70212
#D88317
#F80304
#ED0200
#E74A03
#F3CA69
#FF000B
#ACA99C
#E00001
#ED120A
#F73D29
#E1E6E3
#EFEFEF
#FDC78B
#B5AB90
#B1061D
#F6CD4C
#D6C01D
#B8B781
#EBCF2E
#68517B
#3B0005
#C4B686
#FD5404
#FEB535
#C7A65F
#B46F13
#ECAE1B
#B11603
#FFBB6D
#EC464F
#ffe066
#FB3B34
#4A8C03
#B6A861
#E9E5C2
#FFBC2F
#DADEC0
#BBA69B
#66B7EC
#F7F1BC
#D9A031
#B51202
#f20010
#C18450
#440D06
#C6C8C3
#C5B9A1
#FFC800
#c10000
#FF3006
#FE3A24
#FF5542
#978540
#D0A254
#F4B317
#CF612A
#D9CAA6
)

# List 2
list2=(
#D2B48C
#A0522D
#8B4513
#BDB76B
#D2691E
#DAA520
#D2691E
#DEB887
#DEB887
#D2691E
#F4A460
#DEB887
#F4A460
#D2691E
#DAA520
#DEB887
#8B4513
#D2691E
#D2691E
#D2691E
#D2691E
#F4A460
#D2691E
#BC8F8F
#D2691E
#D2691E
#D2691E
#D2B48C
#D2B48C
#DEB887
#BC8F8F
#8B4513
#F4A460
#DAA520
#BDB76B
#DAA520
#A0522D
#8B4513
#D2B48C
#D2691E
#DAA520
#BDB76B
#D2691E
#DAA520
#8B4513
#F4A460
#D2691E
#F4A460
#D2691E
#8B4513
#BDB76B
#DEB887
#DAA520
#D2B48C
#BC8F8F
#BC8F8F
#DEB887
#DAA520
#8B4513
#D2691E
#CD853F
#8B4513
#D2B48C
#D2B48C
#DAA520
#8B4513
#D2691E
#D2691E
#D2691E
#CD853F
#CD853F
#DAA520
#D2691E
#D2B48C
)

# File to modify
file="dummy-cocktails.json"

# Loop through the lists and replace
for i in "${!list1[@]}"; do
  sed -i "s/${list1[$i]}/${list2[$i]}/g" "$file"
done

