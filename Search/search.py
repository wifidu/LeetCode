import time


class Solution:
    def search(self, nums:[int], target:int) -> int:
        left, right = 0, len(nums) - 1
        while left <= right:
            pivot = left + (right - left)//2
            if nums[pivot] == target:
                return pivot
            if target < nums[pivot]:
                right = pivot - 1
            else:
                left = pivot + 1
        return -1

if __name__ == "__main__":

    start = time.time()
    search = Solution()

    print(search.search([-1,0,3,5,9,12], 9))
    end = time.time()
    print('time:' + str(end - start))
